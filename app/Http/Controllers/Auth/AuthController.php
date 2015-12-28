<?php namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller {

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
    	$email=$request->input("email");
    	$password=$request->input("password");
        $a=Auth::attempt(['email' => $email, 'password' => $password]);
        if ($a){
          if(Auth::user()->type==0){
    				Auth::user()->rating_like_organizer;
    				$filtered = Auth::user()->rating_like_organizer->filter(function ($item) {
    				    return $item->type == 1;
    				});
    				$rating = $filtered->avg('question0');
    			}
    			else if (Auth::user()->type==1){
    				Auth::user()->rating_like_sponzor;
    				$filtered = Auth::user()->rating_like_sponzor->filter(function ($item) {
    				    return $item->type == 0;
    				});
    				$rating = $filtered->avg('question0');
    			}
    		  return response()->json([
    				"success" => true,
    				"user"=>Auth::user(),
            "token"=>Auth::user()->token,
            "rating"=>$rating
    				], 200
    			);
		    }
        else{
        	return response()->json(
				["message"=>"Invalid credentials",
				], 404
			);
        }
    }
}
