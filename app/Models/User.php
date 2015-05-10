<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];
	
	public function user(){
 
        return $this->belongsTo('App\Models\User');
 
    }
    public function events()
    {
        return $this->hasMany('App\Models\Event','organizer');
    }
}
