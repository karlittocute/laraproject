<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
	protected $guarded = ['id','created_at','updated_at','_token', 'submitFilial'];
	
    public function operator()
	{
	    return $this->hasMany(Operator::class);
	}
}
