<?php

namespace App;
Use App\User;
use App\Tea;

use Illuminate\Database\Eloquent\Model;

class Tea_Details extends Model
{
     protected $fillable = [
        'user_id','net_weight' ,'gross_weight','offered_by','total_as_at_day','receipt_no','tea_no','date_offered',
    ];
     public function teas() {

        return $this->BelongsTo(Tea::class,'tea_no');
    }
     public function users() {

        return $this->BelongsTo(Users::class);
    }
}
