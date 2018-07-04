<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
	protected $guarded = ['_token','id','filialId','user_id','created_at','updated_at'];
	
    public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function filial()
	{
		return $this->belongsTo(Filial::class);
	}
}
