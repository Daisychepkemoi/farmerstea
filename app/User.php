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
        'f_name','l_name', 'email','phone_no','national_id','role','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function teas() {

     
        return $this->hasOne(Tea::class);
    }
     public function notifications() {

        return $this->hasMany(Notification::class);
    }
     public function Events() {

        return $this->hasMany(Event::class);
    }
     public function producedetail() {

        return $this->hasMany(ProduceDetail::class);
    }





    //check whether user is admin

    // public function isAdmin() {

    //     if($this->is_admin) {

    //         return true;
    //     }

    //     return false;
    // }


}
