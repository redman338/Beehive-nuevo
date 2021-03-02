<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Landing;

class PageController extends Controller
{
   public function landing($slug)
    {

    	$landing = Landing::where('slug', $slug)->first();

    		return view('web.landing', compact('landing'));

    }
}
