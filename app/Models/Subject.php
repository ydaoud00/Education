<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
	protected $fillable = ['name', 'center_id', 'grade_id', 'course'];
  	protected $guarded = ['id'];

  	public function center()
    {
        return $this->belongsTo('App\Models\Center');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}
