<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = 'centers';
	protected $fillable = ['name', 'city', 'type'];
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
