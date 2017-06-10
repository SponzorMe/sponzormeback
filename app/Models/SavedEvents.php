<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedEvents extends Model {

	protected $table = 'saved_events';

	protected $fillable = ['user_id','event_id'];

	protected $hidden = ['created_at', 'updated_at'];

	public function event()
  {
      return $this->belongsTo('App\Models\Event','event_id');
  }
	public function user()
  {
      return $this->belongsTo('App\Models\User','user_id');
  }
}
