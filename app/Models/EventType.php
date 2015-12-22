<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'event_types';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'lang'];

	protected $hidden = ['created_at', 'updated_at'];

	public function events()
    {
        return $this->hasMany('App\Models\Event','type');
    }

}