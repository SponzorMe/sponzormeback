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
<<<<<<< HEAD
=======
        //dd($a);
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
        if ($a)
		{
		    return response()->json([
				"success" => true,
				"user"=>Auth::user(),
                "token"=>Auth::user()->token
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
<<<<<<< HEAD
}
=======
}
>>>>>>> 886196f6324c74af87a64306a83398414c37e1b1
