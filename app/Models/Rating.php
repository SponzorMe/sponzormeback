<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ratings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['organizer_id', 'sponzor_id', 'question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10', 'sponzorship_id', 'type'];

	protected $hidden = ['created_at', 'updated_at'];

	public function organizer(){
      return $this->belongsTo('App\Models\User','organizer_id');
  }
  public function sponzor(){
      return $this->belongsTo('App\Models\User','sponzor_id');
  }
  public function sponzorship(){
      return $this->belongsTo('App\Models\Sponzorship','sponzorship_id');
  }
}
