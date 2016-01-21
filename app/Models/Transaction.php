<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'transactions';

	protected $fillable = ['txn_id', 'sponzorship_id', 'amount', 'user_id', 'item_name', 'payment_date', 'payment_status', 'type'];

	protected $hidden = ['created_at', 'updated_at'];

	public function sponzor()
  {
      return $this->belongsTo('App\Models\User','user_id');
  }

}
