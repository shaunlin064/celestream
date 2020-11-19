<?php
	
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use App\Helpers;
	class FacebookMediaDetail extends Model {
		use HasFactory;
		
		protected $fillable = [
			'fans_count',
			'avg_likes_count',
			'avg_comments_count',
			'avg_shares_count',
			'avg_interaction_rate',
			'affinity_category_rate',
			'influence_rate',
			'diffusion_rate',
			'real_interaction_rate',
			'created_at',
		];
		
		protected $table = 'kol_social_media_facebook_details';
		
		protected $attributes = [
			'fans_count' => '',
			'avg_likes_count' => '',
			'avg_comments_count' => '',
			'avg_shares_count' => '',
			'avg_interaction_rate' => '',
			'affinity_category_rate' => '',
			'influence_rate' => '',
			'diffusion_rate' => '',
			'real_interaction_rate' => '',
		];
		
		public function kolSocialMedia (  ) {
			return $this->morphToMany('App\Models\KolSocialMedia', 'kol_social_media_ables');
		}
	}
