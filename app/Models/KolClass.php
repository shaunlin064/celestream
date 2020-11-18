<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KolClass extends Model
{
    use HasFactory;
    
	protected $fillable = ['kol_id','kolClassable_type','kolClassable_id'];
	
	public function kol (  ) {
		$this->belongsTo(Kol::Class);
    }
    
	public function industry_class ( ) {
		return $this->morphedByMany('App\Models\IndustryClass', 'kolclassable');
	}
}
