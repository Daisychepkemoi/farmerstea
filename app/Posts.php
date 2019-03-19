<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
	protected $dates = [
    'created_at',
    'updated_at',
    // your other new column
];
	 protected $fillable = [
        'created_by','title' ,'body','image',
    ];
public function comments()
{
	
        return $this->hasMany(App\Comments::class,'user_id');
    //
}
}
