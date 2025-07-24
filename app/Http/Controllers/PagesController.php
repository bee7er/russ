<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Template;
use App\Tutorial;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	const ABOUT_TEMPLATE = '*About';
	const CONTACT_TEMPLATE = '*Contact';

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
	 * Show the Expressions page to the user.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function expressions(Request $request)
	{
		return view('pages.expressions');
	}

	/**
	 * Show the Tutorials page to the user.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function tutorials(Request $request)
	{
		$loggedIn = false;
		if ($this->auth->check()) {
			$loggedIn = true;
		}

		$tutorials = Tutorial::select(
			array(
				'tutorials.id',
				'tutorials.seq',
				'tutorials.thumb',
				'tutorials.title',
				'tutorials.url',
				'tutorials.html',
				'tutorials.deleted_at'
			)
		)
			->orderBy("tutorials.seq")
			->limit(999)->get();

		$currentPage = 'tutorials';

		return view('pages.tutorials', compact('tutorials', 'loggedIn', 'currentPage'));
	}

	/**
	 * Show the About page to the user.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function about(Request $request)
	{
		$loggedIn = false;
		if ($this->auth->check()) {
			$loggedIn = true;
		}

		$about = Template::where([ 'name' => self::ABOUT_TEMPLATE, 'deleted_at' => null ])->get()->first();
		$aboutText = $about ? $about->container: null;

		$currentPage = 'about';

		return view('pages.about', compact('aboutText', 'loggedIn', 'currentPage'));
	}

	/**
	 * Show the Contact page to the user.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function contact(Request $request)
	{
		$loggedIn = false;
		if ($this->auth->check()) {
			$loggedIn = true;
		}

		$contact = Template::where([ 'name' => self::CONTACT_TEMPLATE, 'deleted_at' => null ])->get()->first();
		$contactText = $contact ? $contact->container: null;

		$currentPage = 'contact';

		return view('pages.contact', compact('contactText', 'loggedIn', 'currentPage'));
	}

}
