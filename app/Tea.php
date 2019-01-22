<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tea extends Model
{
     protected $fillable = [
        'tea_no','location', 'bonus','expected_produce','user_id','no_of_fert','no_acres',
    ];
     public function Users() {

        return $this->BelongsTo(User::class);
    }
     public function producedetail() {

        return $this->hasMany(ProduceDetail::class);
    }
   



}
