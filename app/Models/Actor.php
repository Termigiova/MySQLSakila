<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 01:14:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Actor
 * 
 * @property int $actor_id
 * @property string $first_name
 * @property string $last_name
 * @property \Carbon\Carbon $last_update
 * 
 * @property \Illuminate\Database\Eloquent\Collection $films
 *
 * @package App\Models
 */
class Actor extends Eloquent
{
	protected $table = 'actor';
	protected $primaryKey = 'actor_id';
	public $timestamps = false;

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'last_update'
	];

	public function films()
	{
		return $this->belongsToMany(\App\Models\Film::class, 'film_actor', 'actor_id', 'film_id')
					->withPivot('last_update');
	}
}
