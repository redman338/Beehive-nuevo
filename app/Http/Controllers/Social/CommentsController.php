<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Post_Comments;
use App\Models\Post;
use Validator;
use Auth;

class CommentsController extends Controller
{
    

    public function savecomments(Request $request)
    {


    	if($request->ajax())
    	{	

    		$auth_user = Auth::User()->id;
    		$cop_id = \Session::get('copropiedad');


    		$validatedData = Validator::make($request->all(),[
            

		            'body'      => 'required|string|max:255',
		            
		        ]);

    		if( $validatedData->fails() ){

               $data = array(

                        'status'  => 'error',
                        'code'    => 404,
                        'message' => 'El Mensaje esta vacio',
                                       
                      );
        
        	}

        	else {
		    		
		    		$Comments = Comments::create([

		    			'post_id'			=> $request->get('post_id'),
		    			'user_id'			=> $auth_user,
		    			'body'				=> $request->get('body'),
		    		]);

                    $Commentsxpost = Post_Comments::create([

                        'post_id'           => $request->get('post_id'),
                        'comments_id'        => $Comments->id,
                    ]);
		    		

		    		$data = array(
                        'status'  => 'success',
                        'code'    => 202,
                        'message' => 'Registro creado con exito',
                      
                      );

		    	}


		    return response()->json($data);

		     
    	}

    }
}
