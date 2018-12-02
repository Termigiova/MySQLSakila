<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 01:14:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class City
 * 
 * @property int $city_id
 * @property string $city
 * @property int $country_id
 * @property \Carbon\Carbon $last_update
 * 
 * @property \App\Models\Country $country
 * @property \Illuminate\Database\Eloquent\Collection $addresses
 *
 * @package App\Models
 */
class City extends Eloquent
{
	protected $table = 'city';
	protected $primaryKey = 'city_id';
	public $timestamps = false;

	protected $casts = [
		'country_id' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'city',
		'country_id',
		'last_update'
	];

	public function country()
	{
		return $this->belongsTo(\App\Models\Country::class, 'city_id', 'country_id');
	}

	public function addresses()
	{
		return $this->hasMany(\App\Models\Address::class, 'city_id', 'address_id');
	}
}
