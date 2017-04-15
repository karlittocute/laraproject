<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Fountadion\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	protected $guarded = ['user_id'];
	
	public function resumes()
	{
	    return $this->hasMany(Resume::class);
	}
	
	public function companies()
	{
	    return $this->hasOne(Company::class);
	}
	public function hasRole($role = null)
	{
		if ($role){
			if ($this->role == $role) {
				return true;
			}
			else {
				return false;
			}
		}
	}
	public function new_company(Company $company)
	{
		$this->companies()->save($company);
	}
}
