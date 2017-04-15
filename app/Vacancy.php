<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = ['name', 'place', 'ageAny', 'education', 'workExp', 'visa', 'pcLevel',
        'eduSpec', 'notes'];
		
	public function company()
	{
		return $this->belongsTo(Company::class);
	}
}
