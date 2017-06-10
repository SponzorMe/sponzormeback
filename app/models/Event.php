<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title','location','ends',
						   'starts','location_reference',
						   'image','description','privacy',
						   'lang','organizer','category','type', 'sumary', 'outstanding'
						  ];

	protected $hidden = ['organizer', 'created_at', 'updated_at'];

	public function organizer()
    {
        return $this->belongsTo('App\Models\User','organizer','id');
    }
		public function user_organizer()
	    {
	        return $this->belongsTo('App\Models\User','organizer','id');
	    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\EventType','type','id');
    }
    public function perks()
    {
        return $this->hasMany('App\Models\Perk','id_event');
    }
    public function sponzorship()
    {
        return $this->hasMany('App\Models\Sponzorship','event_id');
    }
		public function perk_tasks()
    {
        return $this->hasMany('App\Models\PerkTask','event_id');
    }
		public function sponzor_tasks()
    {
        return $this->hasMany('App\Models\TaskSponzor','event_id');
    }

}
