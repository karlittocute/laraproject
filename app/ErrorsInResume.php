<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorsInResume extends Model
{
	protected $fillable = ['reason'];
	protected $primaryKey = 'resume_id';
    public function resume()
	{
		return $this->belongsTo(Resume::class);
	}
}
