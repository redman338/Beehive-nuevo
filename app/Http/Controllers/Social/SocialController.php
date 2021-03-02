<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Auth;

class SocialController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

    	$cop_id = \Session::get('copropiedad');

    	 $user = Auth::user();

    	$wall = [
            'new_post_group_id' => 0
        ];


    	return view('social.home', compact('wall', 'user'));
    }

}
