<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'center_id', 'grade_id', 'course'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;

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
