<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 05 Sep 2018 08:29:36 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Course
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $year
 * @property float $rating
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $movie_actors
 *
 * @package App\Models
 */
class Course extends Eloquent
{
	protected $casts = [
		'year' => 'int',
		'rating' => 'float'
	];

	protected $fillable = [
		'name',
		'description',
		'year',
		'rating',
		'image'
	];
}
