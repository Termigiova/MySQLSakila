<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 01 Dec 2018 01:14:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $category_id
 * @property string $name
 * @property \Carbon\Carbon $last_update
 * 
 * @property \Illuminate\Database\Eloquent\Collection $films
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $table = 'category';
	protected $primaryKey = 'category_id';
	public $timestamps = false;

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'name',
		'last_update'
	];

	public function films()
	{
		return $this->belongsToMany(\App\Models\Film::class, 'film_category', 'category_id', 'film_id')
					->withPivot('last_update');
	}
}
