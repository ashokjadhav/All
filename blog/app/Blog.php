<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title','description'];

    public function user(){
    	return $this->belongsTo(User::class,'userId');
    }

	public function comments(){
    	return $this->hasMany(Comment::class);
    }
}
