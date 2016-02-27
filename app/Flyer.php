<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
	protected $fillable = [
		'street',
		'city',
		'state',
		'zip',
		'country',
		'price',
		'description',
	];
	public function photos() {
		return $this->hasMany('App\Photo');
	}
}
