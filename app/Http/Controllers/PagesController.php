<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function expressions()
	{
		return view('pages.expressions');
	}

	public function contact()
	{
		return view('pages.contact');
	}

}
