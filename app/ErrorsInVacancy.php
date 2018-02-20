<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorsInVacancy extends Model
{
	protected $primaryKey = 'vacancy_id';
     public function vacancy()
	{
		return $this->belongsTo(Vacancy::class);
	}
}
