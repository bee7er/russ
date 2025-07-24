<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Template;
use App\Resource;
use App\Tutorial;
use App\User;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
        view()->share('type', '');
    }

	public function index()
	{
        $title = "Dashboard";

        $users = User::count();
        $template = Template::count();
        $resource = Resource::count();
        $tutorial = Tutorial::count();
		return view('admin.dashboard.index',  compact('title','resource','tutorial','template','users'));
	}
}