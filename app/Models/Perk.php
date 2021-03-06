<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perk extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'perks';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['kind', 'usd', 'total_quantity', 'reserved_quantity','id_event'];

	protected $hidden = ['created_at', 'updated_at'];

	/**
	 *  One category has one or many events.
	 *
	 */
	public function event()
    {
        return $this->belongsTo('App\Models\Event','id_event');
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\PerkTask','perk_id');
    }
    public function sponzor_tasks()
    {
        return $this->hasMany('App\Models\TaskSponzor','perk_id');
    }
		public function sponzorships()
    {
        return $this->hasMany('App\Models\Sponzorship','perk_id');
    }

}
