<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kol extends Model
{
    use HasFactory;
	
    protected $fillable = ['third_party_id','name','introduction','created_at_mark'];
    
    protected $attributes = [
    	'introduction' => '',
	    'name' => '',
	    'created_at_mark' => 0
	];
	
	public function industry ( ) {
		return $this->morphedByMany('App\Models\IndustryClass', 'kol_class_ables');
	}
	
	public function images ( ) {
		return $this->morphedByMany('App\Models\ImageClass', 'kol_class_ables');
	}
	
	public function match ( ) {
		return $this->morphedByMany('App\Models\MatchClass', 'kol_class_ables');
	}
	
	public function socialMedias (  ) {
		return $this->hasMany(KolSocialMedia::Class);
	}
	
}
