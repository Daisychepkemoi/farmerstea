<?php

namespace App;
Use App\User;
use App\Tea;

use Illuminate\Database\Eloquent\Model;

class Tea_Details extends Model
{
     protected $fillable = [
        'user_id','title' ,'body',
    ];
     public function teas() {

        return $this->BelongsTo(Tea::class,'tea_no');
    }
     public function users() {

        return $this->BelongsTo(Users::class);
    }
}
