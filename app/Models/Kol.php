<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kol extends Model
{
    use HasFactory;
	
    protected $fillable = ['third_party_id','name','introduction'];
    
    protected $attributes = [
    	'introduction' => '',
	    'name' => '',
	];
	
	public function industry ( ) {
		return $this->morphedByMany('App\Models\IndustryClass', 'kolclassable');
	}
	
	public function images ( ) {
		return $this->morphedByMany('App\Models\ImageClass', 'kolclassable');
	}
	
	public function match ( ) {
		return $this->morphedByMany('App\Models\MatchClass', 'kolclassable');
	}
	
}
