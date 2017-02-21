<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'field', 'profile', 'cityId', 'address', 'persons', 'phone',
        'email', 'contractNumber', 'additionalInfo'];
}
