<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    // protected $dates = [''];
     protected $fillable = [
        'status','title' ,'body','email',
    ];
     public function users() {

        return $this->BelongsTo(User::class);
    }

}
