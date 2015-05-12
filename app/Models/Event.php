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
						   'lang','organizer'
						  ];

	protected $hidden = ['category', 'type', 'organizer', 'created_at', 'updated_at'];

	public function organizer()
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
        return $this->hasMany('App\Models\Sponzorship','id_event');
    }

}