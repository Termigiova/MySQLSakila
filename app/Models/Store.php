<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 01:14:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Store
 * 
 * @property int $store_id
 * @property int $manager_staff_id
 * @property int $address_id
 * @property \Carbon\Carbon $last_update
 * 
 * @property \App\Models\Address $address
 * @property \Illuminate\Database\Eloquent\Collection $staff
 * @property \Illuminate\Database\Eloquent\Collection $customers
 * @property \Illuminate\Database\Eloquent\Collection $inventories
 *
 * @package App\Models
 */
class Store extends Eloquent
{
	protected $table = 'store';
	protected $primaryKey = 'store_id';
	public $timestamps = false;

	protected $casts = [
		'manager_staff_id' => 'int',
		'address_id' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'manager_staff_id',
		'address_id',
		'last_update'
	];

	public function address()
	{
		return $this->belongsTo(\App\Models\Address::class, 'store_id', 'address_id');
	}

	public function staff()
	{
		return $this->hasMany(\App\Models\Staff::class);
	}

	public function customers()
	{
		return $this->hasMany(\App\Models\Customer::class);
	}

	public function inventories()
	{
		return $this->hasMany(\App\Models\Inventory::class);
	}

	public function city() {
        return $this->hasManyThrough(
            Address::class,
            City::class,
            'city_id',
            'address_id',
            'store_id',
            'city_id');
    }
}
