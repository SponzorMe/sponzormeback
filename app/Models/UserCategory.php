<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $hidden = ['created_at', 'updated_at'];

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
	public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

}