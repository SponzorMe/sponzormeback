<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'body', 'lang'];

	protected $hidden = ['created_at', 'updated_at'];

	/**
	 *  One category has one or many events.
	 *
	 */
	public function events()
    {
        return $this->hasMany('App\Models\Event','category');
    }
    /**
	 *  One category has one or many interests (subtopics).
	 *
	 */
	public function interests()
    {
        return $this->hasMany('App\Models\InterestCategory','category_id');
    }

}
