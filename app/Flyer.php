<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
	protected $fillable = [
		'user_id',
		'street',
		'city',
		'state',
		'zip',
		'country',
		'price',
		'description',
	];

	public static function locatedAt($zip, $street) {

        $street = str_replace('-', ' ', $street);

        return static::where(compact('zip', 'street'))->firstOrFail();

	}

	public function getPriceAttribute($price) {
		return '$' . number_format($price);
	}

	public function addPhoto(Photo $photo) {
		return $this->photos()->save($photo);
	}

	public function photos() {
		return $this->hasMany('App\Photo');
	}

	public function owner() {
		return $this->belongsTo('App\User', 'id', 'user_id');
	}

	public function ownedBy(User $user) 
	{
		return $this->user_id == $user->id;
	}

	public function path() {
		return $this->zip . '/' . str_replace(' ', '-', $this->street);
	}
}
