<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $guarded = ['_token','id','filialId','operatorId','user_id','created_at','updated_at','resumeLifetime','active','contact','public', 'schedulespecial','submitResume'];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function error()
	{
	    return $this->hasOne(ErrorsInResume::class);
	}
}
