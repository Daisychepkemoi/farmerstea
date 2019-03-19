<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	protected $dates = [
    'created_at',
    'updated_at',
    // your other new column
];
protected $fillable = [
        'user_id' ,'body','post_id',
    ];
	public function posts(){
            return $this->BelongsTo(Posts::class,'post_id');

}
}
