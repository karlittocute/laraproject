<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'field', 'profile', 'cityId', 'address', 'persons', 'phone',
        'email', 'contractNumber', 'additionalInfo'];
		
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function vacancy()
	{
	    return $this->hasMany(Vacancy::class);
	}
}
