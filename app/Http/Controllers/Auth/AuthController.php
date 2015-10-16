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
<<<<<<< HEAD
        //dd($a);
=======
>>>>>>> local
=======
>>>>>>> staging
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
<<<<<<< HEAD
}
=======
}
>>>>>>> local
=======
}
>>>>>>> staging
