<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerkTask extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'perk_tasks';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'description', 'type', 'status'];

	protected $hidden = ['created_at', 'updated_at'];

	/**
	 *  One category belongs to an event.
	 *
	 */
	public function event()
    {
        return $this->belongsTo('App\Models\Event','event_id');
    }
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
	public function perk()
    {
        return $this->belongsTo('App\Models\Perk','perk_id');
    }

}