<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     protected $fillable = [
        'title','body', 'user_id',
    ];
     public function users() {

        return $this->Belongsto(User::class);
    }
    


}
