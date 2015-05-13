<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterestCategory extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'interests_categories';

	protected $primaryKey = 'id_interest';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'category_id', 'lang'];

	protected $hidden = ['created_at', 'updated_at'];

	/**
	 *  One category has one or many events.
	 *
	 */
	public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

}