<?php
	/**
	 * Created by PhpStorm.
	 * User: shaun
	 * Date: 2020/11/16
	 * Time: 17:52
	 */
	
	
	namespace App\Service;
	
	
	use App\Models\ImageClass;
	use App\Models\IndustryClass;
	use App\Models\Kol;
	use App\Models\MatchClass;
	use Eloquent;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Str;
	use App\Helpers;
	/**
	 * Kol
	 *
	 * @mixin Eloquent
	 */
	class KolDataReceiveService {
		
		public function dataSave ( $dates ) {
			
			$cratedMark = $dates['created_at'];
//
			try {
			    DB::beginTransaction();
					/*save kol*/
					$kolData = $this->kol_third_party_key_switch($dates);
					Kol::updateOrCreate(['third_party_id'=>$kolData['third_party_id']])->update($kolData);
					$kol = Kol::where('third_party_id',$kolData['third_party_id'])->first();
					
					/*save class*/
					/*checkOrCreateClass*/
					foreach($dates['kol_class'] as $type => $items){
						$this->checkOrCreateClass($items,$type)
						     ->each(function($v) use($kol,$type){
							     /* add class to kol*/
							     if($kol->$type->where('id',$v['id'])->count() == 0){
								     $kol->$type()->attach($v);
							     }
						     });
					}
					$kol->refresh();
					
					//save social media
					$trimSocialMediaData = collect($this->kol＿social_media_third_party_key_switch($dates['social_media']));
					
					//updateOrCreated social media detail;
					$trimSocialMediaData->each(function($v,$socialName) use($kol,$cratedMark){
						$socialMedia = $kol->socialMedias()->updateOrCreate(['social_media_name' => $socialName]);
						$socialMedia->update($v->toArray());
						$v['data']['created_at'] = $cratedMark;
						
						#detail exists check
						$detailQuery = $socialMedia->$socialName()->where('created_at',$cratedMark);
						if($detailQuery->exists()){
							$detailOrm =  $detailQuery->first();
							$detailOrm->update($v['data']->toArray());
						}else{
							$detailOrm =  $socialMedia->$socialName()->create($v['data']->toArray());
						}
					});
					$kol->update(['created_at_mark' => 1]);
			    DB::commit();
			} catch(\Exception $e) {

			    DB::rollback();
			    dd($e->getMessage());
			}
			
		}
		
		/**
		 * @param $thirdPartyReceiveData
		 * @param $thirdPartyName  //String
		 * @return array|\Illuminate\Support\Collection
		 */
		public function kol_third_party_key_switch ( Array $thirdPartyReceiveData, $thirdPartyName='prefluencer' ) {
			
			$newItem = [];
			switch($thirdPartyName){
				case 'prefluencer':
					$newItem['third_party_id'] = $thirdPartyReceiveData['id'];
					$newItem['name'] = $thirdPartyReceiveData['name'];
					$newItem['introduction'] = $thirdPartyReceiveData['introduction'];
					break;
			}
			
			return $newItem;
		}
		
		public function kol＿social_media_third_party_key_switch ( Array $thirdPartyReceiveSocialMediaData, $thirdPartyName='prefluencer' ) {
			
			$newItem = [];
			switch($thirdPartyName){
				case 'prefluencer':
					foreach ($thirdPartyReceiveSocialMediaData as $socialName => $item){
						$newItem[$socialName] = collect([]);
						$newItem[$socialName]['social_media_name'] = $socialName;
						$newItem[$socialName]['social_media_url'] = $item['social_media_url'];
						$newItem[$socialName]['image_url'] = $item['image_url'];
						$newItem[$socialName]['data'] = collect($item['data'])->flatMap(function($v,$k){
							$keyName = Helpers\humpToUnderLine($v['name']);
							$value = $v['value'];
							
							if( empty($v['value'])){
								return [$keyName => $value];
							}
							// number unit change
							if(strpos($keyName,'count')){
								
								$numberUnitStr = $v['value'][-1];
								
								$changeNumberUnit = !is_numeric($numberUnitStr) ? Helpers\transformNumberUnit($numberUnitStr) : 1;
								
								$value = (float)$value * $changeNumberUnit;
								
							};
							
							// filter percentage
							if(strpos($keyName,'rate')){
								$value = (float)$value;
							}
							
						    return [$keyName => $value];
						});
					}
					break;
			}
			
			return $newItem;
		}
		
		/**
		 * @param $dates //Array class values
		 * @param $type  //String
		 * @return array|\Illuminate\Support\Collection
		 */
		private function checkOrCreateClass ( $dates , $type) {
			
			switch($type){
				case 'industry':
					$results = collect($dates)->map(function($v,$k){
						return IndustryClass::updateOrCreate(['name'=> $v ]);
					});
					break;
				case 'match':
					$results = collect($dates)->map(function($v,$k){
						return MatchClass::updateOrCreate(['name'=> $v ]);
					});
					break;
				case 'images':
					$results = collect($dates)->map(function($v,$k){
						return ImageClass::updateOrCreate(['name'=> $v ]);
					});
					break;
				default:
					$results = [];
			}
			return $results;
		}
	}