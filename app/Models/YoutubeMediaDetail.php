<?php
	
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class YoutubeMediaDetail extends Model {
		use HasFactory;
		
		protected $fillable = [
			'subscription_count',
			'avg_views_count',
			'avg_likes_count',
			'avg_comments_count',
			'avg_interaction_rate',
			'created_at'
		];
		
		protected $table = 'kol_social_media_youtube_details';
		
		protected $attributes = [
			'subscription_count' => '',
			'avg_views_count' => '',
			'avg_likes_count' => '',
			'avg_comments_count' => '',
			'avg_interaction_rate' => '',
		];
		
		public function kolSocialMedia (  ) {
			return $this->morphOne('App\Models\KolSocialMedia', 'kol_social_media_ables',);
		}
	}
