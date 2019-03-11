<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    
	protected $fillable = ['title','body','user_id'];
	//protected $guarded = ['id','payment_key'];
	
	public function user() {
		
		return $this->belongsTo(User::class);
		
		}
	
	public function comments() {
		
		return $this->hasMany(Comment::class);
		
		}
		
	
	}
