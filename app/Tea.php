<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tea extends Model
{
     protected $fillable = [
        'Tea_no','location' 'bonus','expected_produce','no_fert_bags','no_acres',
    ];
     public function Users() {

        return $this->BelongsTo(User::class);
    }
     public function reports() {

        return $this->hasMany(Report::class);
    }
   



}
