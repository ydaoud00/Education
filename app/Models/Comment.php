<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
	protected $fillable = ['description', 'file_id'];
  	protected $guarded = ['id'];
  	public $timestamps = false;

  	public function file()
    {
        return $this->belongsTo('App\Models\File');
    }
}
