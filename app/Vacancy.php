<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $guarded = ['id','companyId', 'operatorId','active','vacancyLifetime','contact','public','created_at','updated_at','_token'];
		
	public function company()
	{
		return $this->belongsTo(Company::class);
	}
	
	public function new_vacancy(Vacancy $vacancy,$company_id,$request)
	{
		$this->company_id = $company_id;
		$guarded = ['id','companyId', 'operatorId','active','vacancyLifetime','contact','public','created_at','updated_at','_token','submitResume']; //дада это повторение (((
		foreach ($request as $k => $v) {  //дада это говнокод (((
			foreach ($guarded as $g) {
				if ($k == $g){ continue 2; }
			}
			$this->$k = $request[$k];
		}
		$this->save();
	}
	
	public function error()
	{
	    return $this->hasOne(ErrorsInVacancy::class);
	}
}
