<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_interests';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $hidden = ['created_at', 'updated_at'];

	/**
	 *  One category belongs to an event.
	 *
	 */
	public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    /**
	 *  One category belongs to an event.
	 *
	 */
	public function interest()
    {
        return $this->belongsTo('App\Models\InterestCategory','interest_id');
    }

}