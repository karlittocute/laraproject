<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorsInCompany extends Model
{
	protected $primaryKey = 'company_id';
    public function company()
	{
		return $this->belongsTo(Company::class);
	}
}
