<?php

namespace App;
Use App\User;
use App\Tea_Details;
use Illuminate\Database\Eloquent\Model;

class Tea extends Model
{
     protected $fillable = [
        'tea_no','location', 'bonus','expected_produce','user_id','no_of_fert','no_acres',
    ];
     public function Users() {

        return $this->BelongsTo(User::class,'user_id');
    }
     public function Tea_details() {

        return $this->hasMany(Tea_Details::class,'tea_no');
    }
   



}
