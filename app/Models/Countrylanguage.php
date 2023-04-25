<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Countrylanguage
 * 
 * @property string $CountryCode
 * @property string $Language
 * @property string $IsOfficial
 * @property float $Percentage
 * 
 * @property Country $country
 *
 * @package App\Models
 */
class Countrylanguage extends Model
{
	protected $table = 'countrylanguage';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Percentage' => 'float'
	];

	protected $fillable = [
		'IsOfficial',
		'Percentage'
	];

	public function country()
	{
		return $this->belongsTo(Country::class, 'CountryCode');
	}
}
