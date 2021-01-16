<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    protected $guarded = array('id');

    
    public static $rules = array(
        'bussiness_hours' => 'required',
        'location' => 'required',
        'phone_number' => 'required',
        'url' => 'required',
        'comment' => 'required',
    );
    
    
    public function images()
    {
      return $this->hasMany('App\Image');
    }
    
    public function checkboxes()
    {
      return $this->hasMany('App\Checkbox');
    }
    
}