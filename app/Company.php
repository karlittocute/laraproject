<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id','user_id', 'operatorId','filialId','active','created_at','updated_at','_token','submit'];
		
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function vacancy()
	{
	    return $this->hasMany(Vacancy::class);
	}
	
	public function error()
	{
	    return $this->hasOne(ErrorsInCompany::class);
	}
	
}
