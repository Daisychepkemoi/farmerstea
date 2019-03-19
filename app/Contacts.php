<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
     protected $fillable = [
        'status','title' ,'body','email',
    ];
     public function users() {

        return $this->BelongsTo(User::class);
    }
}
