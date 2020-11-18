<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebookMediaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_media_details', function (Blueprint $table) {
            $table->id();
	        $table->unsignedInteger('fans_count')->comment('粉絲數');
	        $table->unsignedFloat('avg_likes_count')->comment('平均按讚');
	        $table->unsignedFloat('avg_comment_count')->comment('平均留言');
	        $table->unsignedFloat('avg_shares_count')->comment('平均分享');
	        $table->unsignedFloat('avg_interaction_rate')->comment('互動率');
	        $table->unsignedFloat('affinity_category_rate')->comment('貼文注目率');
	        $table->unsignedFloat('influence_rate')->comment('深層影響力');
	        $table->unsignedFloat('diffusion_rate')->comment('深層擴散率');
	        $table->unsignedFloat('real_interaction_rate')->comment('深層互動率');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facebook_media_details');
    }
}
