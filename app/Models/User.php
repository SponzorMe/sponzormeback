<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
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
	protected $fillable = ['name', 'email', 'password','lang','type', 'sex'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token', 'updated_at'];

	public function user(){

        return $this->belongsTo('App\Models\User');

    }
    public function events()
    {
        return $this->hasMany('App\Models\Event','organizer');
    }
		public function perks()
    {
        return $this->hasManyThrough('App\Models\Perk', 'App\Models\Event', 'organizer', 'id_event');
    }
    public function interests()
    {
        return $this->hasMany('App\Models\UserInterest','user_id');
    }
    public function categories()
    {
        return $this->hasMany('App\Models\UserCategory','user_id');
    }
    public function perk_tasks()
    {
        return $this->hasMany('App\Models\PerkTask','user_id');
    }
    public function sponzorships()
    {
        return $this->hasMany('App\Models\Sponzorship','sponzor_id');
    }
		public function sponzorships_like_organizer()
    {
        return $this->hasMany('App\Models\Sponzorship','organizer_id');
    }
    public function tasks_sponzor_like_organizer()
    {
        return $this->hasMany('App\Models\TaskSponzor','organizer_id');
    }
    public function tasks_sponzor_like_sponzor()
    {
        return $this->hasMany('App\Models\TaskSponzor','sponzor_id');
    }
		public function rating_like_organizer()
    {
        return $this->hasMany('App\Models\Rating','organizer_id');
    }
		public function rating_like_sponzor()
    {
        return $this->hasMany('App\Models\Rating','sponzor_id');
    }
}
