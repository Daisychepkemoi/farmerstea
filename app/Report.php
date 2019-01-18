<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     protected $fillable = [
        'user_id','title' 'body',
    ];
     public function teas() {

        return $this->BelongsTo(Tea::class);
    }
     public function users() {

        return $this->BelongsTo(Users::class);
    }
    


}
