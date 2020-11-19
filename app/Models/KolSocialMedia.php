<?php
	
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	
	class KolSocialMedia extends Model {
		use HasFactory;
		
		protected $fillable = [ 'social_media_name', 'social_media_url', 'image_url' ];
		
		protected $attributes = [
			'social_media_url' => '',
			'image_url'        => '',
		];
		
		public function kol() {
			return $this->belongsTo(Kol::Class);
		}
		
		public function youtube () {
			return $this->morphedByMany('App\Models\YoutubeMediaDetail', 'kol_social_media_ables');
		}
		
		public function facebook () {
			return $this->morphedByMany('App\Models\FacebookMediaDetail', 'kol_social_media_ables');
		}
		
		public function instagram () {
			return $this->morphedByMany('App\Models\InstagramMediaDetail', 'kol_social_media_ables');
		}
		
	}
