<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $table = 'order_detail';

	protected $casts = [
		'order_od' => 'int',
		'product_id' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'notes'
	];
}
