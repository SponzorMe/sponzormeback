<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskSponzor extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'task_sponzors';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['status','task_id','perk_id','sponzor_id','organizer_id','event_id','sponzorship_id','status'];

	protected $hidden = ['created_at', 'updated_at'];

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
	public function event()
    {
        return $this->belongsTo('App\Models\Event','event_id');
    }
    public function perk()
    {
        return $this->belongsTo('App\Models\Perk','perk_id');
    }
    public function task()
    {
        return $this->belongsTo('App\Models\PerkTask','task_id');
    }
    public function Sponzorship()
    {
        return $this->belongsTo('App\Models\Sponzorship','sponzorship_id');
    }

}
