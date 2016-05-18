<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponzorship;
use App\Models\User;
use App\Models\TaskSponzor;
use App\Models\PerkTask;
use App\Models\Perk;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Weblee\Mandrill\Mail;
use Fahim\PaypalIPN\PaypalIPNListener;
use Log;
use App\Services\Notification;

class SponzorshipController extends Controller {
	public function __construct()
	{
		$this->middleware('auth.basic.once',['only'=>['store','update','destroy']]);
	}
	public function paypalIpn()
	{
    $ipn = new PaypalIPNListener();
		$ipn->use_sandbox = false;
    $item = [];
    $item['type'] = 1; //true
    $sandbox = \Config::get('constants.sandbox');
    if($sandbox){
      $ipn->use_sandbox = true;
      $item['type'] = 0; //test
    }
		try{
			$verified = $ipn->processIpn();
	    $report = $ipn->getTextReport();
      $item['payment_status'] = $_POST['payment_status'];
      $item['txn_id'] = $_POST['txn_id'];
      $item['sponzorship_id'] = $_POST['item_number'];
      $item['amount'] = $_POST['mc_gross'];
      $item['item_name'] = $_POST['item_name'];
      $item['payment_date'] = $_POST['payment_date'];
      $item['user_id'] = $_POST['custom'];
      $Transaction=Transaction::create($item);
			if ($verified) {
	        if($_POST['payment_status'] == 'Completed'){
							$item_id = $_POST['item_number'];
							$Sponzorship=Sponzorship::find($item_id);
							if($Sponzorship){
								$Sponzorship->status = 3;
								$Sponzorship->save();

							}
	        }
	    }
			else{
				$item_id = $_POST['item_number'];
				$Sponzorship=Sponzorship::find($item_id);
				if($Sponzorship){
					$Sponzorship->status = 4;
					$Sponzorship->save();
				}
			}
			//----------------- --- NOTIFICATION EMAIL------------------------------//
			$notification = new Notification();
<<<<<<< HEAD
			$vars = array(
					'eventName' => $Sponzorship->event->title
			);
=======
			$vars = array('eventName' => $Sponzorship->event->title);
>>>>>>> staging
			$to = ['name'=>$Sponzorship->organizer->name, 'email'=>$Sponzorship->organizer->email];
			$notification->sendEmail('sponsorpayment', $Sponzorship->organizer->lang, $to, $vars);
			//----------------------------------------------------------------------//
		}
		catch(Exception $e){
			\Log::info($e->getMessage());
		}
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$SponzorsEvents = Sponzorship::get();
		return response()->json([
			"success" => true,
			"SponzorsEvents"=>$SponzorsEvents->toArray()
			], 200
		);
	}
	/**
	* Display a list of sponzorships based in organizer id
	*/
	public function showByOrganizer($organizerId){
			$sponzorships = Sponzorship::where('organizer_id', $organizerId)
			->join('events', 'event_id', '=', 'events.id')
			->join('users', 'sponzor_id', '=', 'users.id')
			->join('perks', 'perk_id', '=', 'perks.id')
			->select('users.name','users.email','events.title', 'events.starts', 'events.location', 'events.ends', 'perks.*', 'sponzorships.*')
			->get();
			return response()->json([
				"success" => true,
				"SponzorsEvents"=>$sponzorships->toArray()
				], 200
			);
	}
	/**
	* Display a list of sponzorships based in sponzor id
	*/
	public function showBySponzor($sponzorId){
			$sponzorships = Sponzorship::where('sponzor_id', $sponzorId)
			->join('events', 'event_id', '=', 'events.id')
			->join('users', 'organizer_id', '=', 'users.id')
			->join('perks', 'perk_id', '=', 'perks.id')
			->select('users.name','users.email','events.title', 'events.starts', 'events.location', 'events.ends', 'perks.*', 'sponzorships.*')
			->get();
			return response()->json([
				"success" => true,
				"SponzorsEvents"=>$sponzorships->toArray()
				], 200
			);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$SponzorEvent = Sponzorship::find($id);
		if(!$SponzorEvent){
			return response()->json(
				["message"=>"Resource not found",
				], 404
			);
		}
		else {
			$tasks = Sponzorship::where('sponzorships.id', $id)
			->join('task_sponzors', 'task_sponzors.sponzorship_id', '=', 'sponzorships.id')
			->join('perk_tasks', 'perk_tasks.id', '=', 'task_sponzors.task_id')
			->select('perk_tasks.*')
			->get();
			$SponzorEvent->task_sponzor;
			return response()->json(
				["data"=>
					[
						"SponzorEvent"=>$SponzorEvent->toArray(),
						"Event"=>$SponzorEvent->event,
						"Sponzor"=>$SponzorEvent->sponzor,
						"Organizer"=>$SponzorEvent->organizer,
						"Perk"=>$SponzorEvent->perk,
						"Tasks"=>$tasks->toArray()
					]
				], 200
			);
		}
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validation = Validator::make($request->all(), [
			'status'=>'required|max:4',
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
			'perk_id'=>'required|max:11|exists:perks,id',
			'event_id'=>'required|max:11|exists:events,id',
			'cause'=>'required|max:255',
    	 ]);
		if($validation->fails())
		{
			return response()->json(['message'=>"Not inserted",'error'=>$validation->messages()],422);
		}
		else
		{
			$aux = Sponzorship::where('sponzor_id','=',$request->input('sponzor_id'))->where('perk_id','=',$request->input('perk_id'))->count();
			if($aux){
				return response()->json(['message'=>"Already Inserted"],409);
			}
			else{
				$Sponzorship=Sponzorship::create($request->all());
				//----------------- --- NOTIFICATION EMAIL------------------------------//
				$notification = new Notification();
<<<<<<< HEAD
				$vars = array(
						'eventName' => $Sponzorship->event->title
				);
=======
				$vars = array('eventName' => $Sponzorship->event->title);
>>>>>>> staging
				$to = ['name'=>$Sponzorship->organizer->name, 'email'=>$Sponzorship->organizer->email];
				$notification->sendEmail('sponsored-event', $Sponzorship->organizer->lang, $to, $vars);
				//----------------------------------------------------------------------//
				$sponzorship = Sponzorship::with(
				'organizer',
				'event',
				'perk.tasks',
				'task_sponzor.task',
				'ratings')
				->where('sponzorships.id','=',$Sponzorship->id)->first();
				return response()->json(['message'=>"Inserted",'Sponzorship'=>$sponzorship],201);
			}
		}
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$Sponzorship=Sponzorship::find($id);
		if(!$Sponzorship){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$inputs = $request->all(); //Get the set of inputs
			extract($inputs); //Creamos las variables desde el array de inputs
		}
		if($request->method()==="PATCH"){//PATCH At least one field is required
			$warnings=array();
      $createSponzorTask = false;
      $deleteSponzorTask = false;
			$flag=0;//If 0 persist nothing was updated.
			if(isset($status) && $status>=0){
				$validator = Validator::make(
				    ['status' => $status],
				    ['status' => ['required', 'max:4']]
				);
				if(!$validator->fails()){
					$flag=1;
          if($status == 1 && $Sponzorship->status == 0){
            $createSponzorTask = true;
          }
          else if($status == 0 && $Sponzorship->status == 1){
            $deleteSponzorTask = true;
          }
					$Sponzorship->status=$status;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($sponzor_id)){
				$validator = Validator::make(
				    ['sponzor_id' => $sponzor_id],
				    ['sponzor_id' => ['required', 'max:4','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->sponzor_id=$sponzor_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($organizer_id)){
				$validator = Validator::make(
				    ['organizer_id' => $organizer_id],
				    ['organizer_id' => ['required', 'max:4','exists:users,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->sponzor_id=$sponzor_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($perk_id)){
				$validator = Validator::make(
				    ['perk_id' => $perk_id],
				    ['perk_id' => ['required', 'max:4','exists:perks,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->perk_id=$perk_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($cause)){
				$validator = Validator::make(
				    ['cause' => $cause],
				    ['cause' => ['required', 'max:255']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->$cause=$cause;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if(!empty($event_id)){
				$validator = Validator::make(
				    ['event_id' => $event_id],
				    ['event_id' => ['required', 'max:4', 'exists:events,id']]
				);
				if(!$validator->fails()){
					$flag=1;
					$Sponzorship->event_id=$event_id;
				}
				else{
					$warnings[]=$validator->messages();
				}
			}
			if($flag){
				$perk = Perk::find($Sponzorship->perk_id);
        if($createSponzorTask){
					$Sponzorship->save();
					if($perk->reserved_quantity +1 < $perk->total_quantity){
						$perk->reserved_quantity += 1;
						$perk->save();
	          $tasks = PerkTask::where('perk_id', '=', $Sponzorship->perk_id)->get();
	          foreach($tasks as $t){
	            $iterator = [
	              'status'=>0,
	              'task_id'=>$t->id,
	              'perk_id'=>$Sponzorship->perk_id,
	              'sponzor_id'=>$Sponzorship->sponzor_id,
	              'organizer_id'=>$Sponzorship->organizer_id,
	              'event_id'=>$Sponzorship->event_id,
	              'sponzorship_id'=>$Sponzorship->id
	            ];
	            TaskSponzor::create($iterator);
	          }
					}
					else if($perk->reserved_quantity +1 == $perk->total_quantity){
						$perk->reserved_quantity += 1;
						$perk->save();
	          $tasks = PerkTask::where('perk_id', '=', $Sponzorship->perk_id)->get();
	          foreach($tasks as $t){
	            $iterator = [
	              'status'=>0,
	              'task_id'=>$t->id,
	              'perk_id'=>$Sponzorship->perk_id,
	              'sponzor_id'=>$Sponzorship->sponzor_id,
	              'organizer_id'=>$Sponzorship->organizer_id,
	              'event_id'=>$Sponzorship->event_id,
	              'sponzorship_id'=>$Sponzorship->id
	            ];
	            TaskSponzor::create($iterator);
	          }
						$aux = Sponzorship::where('organizer_id', '=', $Sponzorship->organizer_id)
						->where('perk_id', '=', $Sponzorship->perk_id)
						->where('status', '=', 0)->get();
						foreach ($aux as $a) {
							$a->task_sponzor()->delete();
				      $perkTasks = PerkTask::where('type', '=', '1')->where('perk_id', '=', $a->perk_id)
				          ->where('user_id', '=', $Sponzorship->sponzor_id)->delete();
							$a->delete();
						}
					}
					else{
						$Sponzorship->status = 0;
						$Sponzorship->save();
						return response()->json(['message'=>"Limite Reach"],409);
					}
					if($Sponzorship->status){
						//----------------- --- NOTIFICATION EMAIL------------------------------//
						$notification = new Notification();

						$vars = ['eventName' => $Sponzorship->event->title,
								'sponzorName' => $Sponzorship->sponzor->name];
						$to = ['name'=>$Sponzorship->sponzor->name, 'email'=>$Sponzorship->sponzor->email];
						$notification->sendEmail('approved', $Sponzorship->sponzor->lang, $to, $vars);
						//----------------------------------------------------------------------//
					}
        }
        elseif($deleteSponzorTask){
          $Sponzorship->task_sponzor()->delete();
					$perk->reserved_quantity -= 1;
					$perk->save();
					//----------------- --- NOTIFICATION EMAIL------------------------------//
					$notification = new Notification();
					$vars = array(

								'eventName' => $Sponzorship->event->title,'sponzorName' => $Sponzorship->sponzor->name

					);
					$to = ['name'=>$Sponzorship->sponzor->name, 'email'=>$Sponzorship->sponzor->email];
					$notification->sendEmail('disapproved', $Sponzorship->sponzor->lang, $to, $vars);
					//----------------------------------------------------------------------//
          $perkTasks = PerkTask::where('type', '=', '1')->where('perk_id', '=', $Sponzorship->perk_id)
          ->where('user_id', '=', $Sponzorship->sponzor_id)->delete();
        }
				$Sponzorship->save();
        $sponzorship = Sponzorship::with(
				'organizer',
				'event',
				'perk.tasks',
				'task_sponzor.task',
				'ratings')
				->where('sponzorships.id','=',$Sponzorship->id)->first();
				return response()->json(['message'=>"Updated",'warnings'=>$warnings,'Sponzorship'=>$sponzorship],200);
			}
			else{
				return response()->json(['message'=>"Nothing updated",'warnings'=>$warnings,'Sponzorship'=>$Sponzorship],200);
			}
		}
		elseif($request->method()==="PUT"){//PUT all fields are required
			$validation = Validator::make($request->all(), [
        	'status'=>'required|max:4',
					'cause'=>'required|max:255',
			'sponzor_id'=>'required|max:11|exists:users,id',
			'organizer_id'=>'required|max:11|exists:users,id',
			'perk_id'=>'required|max:11|exists:perks,id',
			'event_id'=>'required|max:11|exists:events,id',
	    	 ]);
			if($validation->fails())
			{
				return response()->json(['message'=>"Not updated",'error'=>$validation->messages()],422);
			}
			else
			{
				$Sponzorship->status=$status;
				$Sponzorship->sponzor_id=$sponzor_id;
				$Sponzorship->perk_id=$perk_id;
				$Sponzorship->event_id=$event_id;
				$Sponzorship->save();
				return response()->json(['message'=>"Updated",'Sponzorship'=>$Sponzorship],200);
			}
		}
		else{
			return response()->json(['message'=>"Method Not Allowed"],405);
		}
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$Sponzorship=Sponzorship::find($id);
		if(!$Sponzorship){
			return response()->json(['message'=>"Not found"],404);
		}
		else{
			$Sponzorship->task_sponzor()->delete();
      $perkTasks = PerkTask::where('type', '=', '1')->where('perk_id', '=', $Sponzorship->perk_id)->where('user_id', '=', $Sponzorship->sponzor_id)->delete();
			//----------------- --- NOTIFICATION EMAIL------------------------------//
			$notification = new Notification();
<<<<<<< HEAD
			$vars = array(
								'eventName' => $Sponzorship->event->title,
								'sponzorName' => $Sponzorship->sponzor->name);
=======
			$vars = array('eventName' => $Sponzorship->event->title, 'sponzorName' => $Sponzorship->sponzor->name);
>>>>>>> staging
			$to = ['name'=>$Sponzorship->organizer->name, 'email'=>$Sponzorship->organizer->email];
			$notification->sendEmail('sponsorshipcanceled', $Sponzorship->organizer->lang, $to, $vars);
			$to = ['name'=>$Sponzorship->sponzor->name, 'email'=>$Sponzorship->sponzor->email];
			$notification->sendEmail('sponsorshipcanceled', $Sponzorship->sponzor->lang, $to, $vars);
			//----------------------------------------------------------------------//
			$Sponzorship->delete();
			return response()->json(['message'=>"Deleted"],200);
		}
	}
}
