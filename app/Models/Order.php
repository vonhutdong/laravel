<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'order';

	protected $fillable = [
		'user_id',
		'total_amount',
		'adress'
	];
}
