<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponzorship extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sponzorships';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['status','sponzor_id','organizer_id','perk_id','event_id','cause'];

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
		public function sponzor()
    {
        return $this->belongsTo('App\Models\User','sponzor_id');
    }
		public function organizer()
    {
        return $this->belongsTo('App\Models\User','organizer_id');
    }
    /**
	 *  One category belongs to an event.
	 *
	 */
		public function perk()
    {
        return $this->belongsTo('App\Models\Perk','perk_id');
    }
		public function task_sponzor()
    {
        return $this->hasMany('App\Models\TaskSponzor');
    }

}
