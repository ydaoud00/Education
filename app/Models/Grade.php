<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';
	protected $fillable = ['name', 'courses', 'type'];
  	protected $guarded = ['id'];
    public $timestamps = false;

  	public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }
}
