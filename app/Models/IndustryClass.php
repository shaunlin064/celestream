<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryClass extends Model
{
    use HasFactory;
	
	protected $fillable = ['name'];
	
	public function kolClass (  ) {
		return $this->morphToMany('App\Models\Kol', 'kol_class_ables');
	}
	
}
