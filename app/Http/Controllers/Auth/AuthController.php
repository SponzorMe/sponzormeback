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
        if (Auth::attempt(['email' => $email, 'password' => $password]))
		{
		    return response()->json([
				"success" => true,
				"user"=>Auth::user()
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