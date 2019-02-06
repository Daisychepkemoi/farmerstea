<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	public function posts(){
            return $this->BelongsTo(Posts::class,'post_id');

}
}
