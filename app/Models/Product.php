<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'price' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'name',
		'image',
		'price',
		'quantity',
		'description'
	];
}
