<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Website\PenroGenderController as PenroGender;
use \App\Http\Controllers\Website\PenroWebsiteController as PenroWebsite;

class IndexController extends Controller
{ 

    public function index(Request $request)
    {

    	$domain = explode('.',$request->getHost());

        if(array_key_exists(0, $domain)) {
            if($domain[0] == 'www') {
                return (new PenroWebsite)->activenavbar($request);
            } else if ($domain[0] == 'gad') {
                return (new PenroGender)->activenavbar($request);
            } else {
                return view('errors.404');
            }
        }
        
    }

}