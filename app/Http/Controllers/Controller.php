<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setCookie(Request $request)
    {
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('loadAll', $request->get('loadAll'), 0));
        return $response;
    }

    public function getCookie(Request $request)
    {
        $value = $request->cookie('loadAll');
        echo $value;
    }
}
