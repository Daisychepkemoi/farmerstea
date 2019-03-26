<?php

namespace App;
Use App\User;
use App\Tea_Details;
use App\Notification;
use App\Event;
use App\Tea;
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
    public function tea() {

     
        return $this->hasOne(Tea::class,'user_id');
    }
     public function notification() {

        return $this->hasMany(Notification::class,'user_id');
    }
     public function Event() {

        return $this->hasMany(Event::class,'user_id');
    }
     public function teadetail() {

        return $this->belongsTo(Tea_Details::class);
    }





    //check whether user is admin

    // public function isAdmin() {

    //     if($this->is_admin) {

    //         return true;
    //     }

    //     return false;
    // }


}
