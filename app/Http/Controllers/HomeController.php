<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Guard;

use App\Resource;
use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
	const INITIAL_LOAD = 10;

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		// NB We initially load only a maximum of 6 resources
		//// Once loaded the user can request more, in which case we load all that are available
		$maxLoad = self::INITIAL_LOAD;
		$cookieLoadAll = $this->getCookie('cookieLoadAll', 0);
		if (isset($cookieLoadAll) && 1 == $cookieLoadAll) {
			$maxLoad = 999;
		}

		$category = trim($request->input('category'));

		$builder = Resource::select(
			array(
				'resources.id',
				'resources.name',
				'resources.description',
				'resources.titleThumb',
				'resources.titleThumbHover',
				'resources.thumb',
				'resources.thumbHover',
				'resources.useThumbHover',
				'resources.isClickable',
				'resources.includeInAll',
				'resources.isAnimator',
				'resources.isDirector',
				'resources.isPersonal',
				'resources.isCommercial',
				'resources.type',
				'resources.seq',
				'resources.deleted_at'
			)
		)
			->orderBy("resources.seq")
			->limit($maxLoad);

		// Ok, may not show all
		$isShowAllResources = false;
		switch($category) {
			case 'animator':
				$builder->where("resources.isAnimator", "=", "1");
				break;
			case 'director':
				$builder->where("resources.isDirector", "=", "1");
				break;
			case 'personal':
				$builder->where("resources.isPersonal", "=", "1");
				break;
			case 'commercial':
				$builder->where("resources.isCommercial", "=", "1");
				break;
			default:
				// All resources to be shown
				$isShowAllResources = true;
				// Exclude certain resources if not to be included here
				$builder->where("resources.includeInAll", "=", "1");
		}

		$resources = $builder->get();

		if ($resources->count() > 0) {
			// Grab the first entry, it is the title entry
			$titleResource = $resources->shift();
			// Derive the hover title image for each remaining entry and add it to the object
			foreach ($resources as &$resource) {
				// If we are to use the hover then generate the necessary HTML
				$resource->hoverActions = '';
				if ($resource->useThumbHover) {
					$resource->hoverActions = sprintf('onmouseover="this.src=\'%s\'" onmouseout="this.src=\'%s\'"',
						$resource->thumbHover, $resource->thumb);
				}
				// Check if the thumb is in fact a video
				$resource->video = '';
				if (false !== strpos($resource->thumb, '.mp4')) {
					$resource->video = $resource->thumb;
				}
				// Check if the thumb is clickable
				$resource->clickAction = $resource->clickActionClass = '';
				if ($resource->isClickable) {
					$resource->clickAction = 'onclick="document.location=\'' . url($resource->name) .'\';"';
					$resource->clickActionClass = 'work-image-clickable';
				}
			}

			// Make sure we have an even number of entries, which is a factor of 3
			$count = $resources->count();

			$first = null;
			$useImage = 0;
			while (($count % 3) !== 0) {
				$use = clone($resources->get($useImage));
				$use['id'] = (9999 + $useImage);        // Dummy unique id
				$resources = $resources->merge([$use]);
				$count = $resources->count();
				$useImage++;
			}
		}

		$loggedIn = false;
		if ($this->auth->check()) {
			$loggedIn = true;
		}

		$currentPage = 'home';

		return view('pages.home', compact('resources', 'cookieLoadAll',
			'titleResource', 'isShowAllResources', 'loggedIn', 'currentPage'));
	}

}
