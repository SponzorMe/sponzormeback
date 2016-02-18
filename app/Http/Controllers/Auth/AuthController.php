<?php namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
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
        $user = User::with(
        'events.perks.tasks',
        'events.perks.sponzor_tasks',
        'sponzorships_like_organizer.sponzor',
        'sponzorships_like_organizer.event',
        'sponzorships_like_organizer.perk',
        'sponzorships_like_organizer.task_sponzor.task',
        'sponzorships_like_organizer.ratings',
        'interests.interest')
        ->where('users.id','=', Auth::user()->id)->first();
        return response()->json([
  				"user"=>$user->toArray(),
          "token"=>Auth::user()->token,
          "rating"=>$rating
  				], 200
  			);
			}
			else if (Auth::user()->type==1){
				Auth::user()->rating_like_sponzor;
				$filtered = Auth::user()->rating_like_sponzor->filter(function ($item) {
				    return $item->type == 0;
				});
				$rating = $filtered->avg('question0');
        $user = User::with(
        'saved_events.event.perks.tasks',
        'sponzorships.organizer',
        'sponzorships.event',
        'sponzorships.perk.tasks',
        'sponzorships.task_sponzor.task',
        'sponzorships.ratings',
        'interests.interest',
        'transactions')
        ->where('users.id','=', Auth::user()->id)->first();
        $today = date("Y-m-d HH:ii:ss");
        $events = Event::with(
        'category',
        'type',
        'user_organizer',
        'perks.tasks')->get();
        //->where('events.starts', '>', $today)->get();
        return response()->json([
  				"user"=>$user->toArray(),
          "token"=>Auth::user()->token,
          "events"=>$events->toArray(),
          "rating"=>$rating
  				], 200
  			);
			}
    }
    else{
    	return response()->json(
				["message"=>"Invalid credentials",
				], 404
			);
    }
  }
}
