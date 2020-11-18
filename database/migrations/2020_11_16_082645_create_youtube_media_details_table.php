<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYoutubeMediaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtube_media_details', function (Blueprint $table) {
            $table->id();
	        $table->unsignedInteger('subscription_count')->comment('訂閱數');
	        $table->unsignedFloat('avg_views_count')->comment('平均觀看');
	        $table->unsignedFloat('avg_likes_count')->comment('平均按讚');
	        $table->unsignedFloat('avg_comment_count')->comment('平均留言');
	        $table->unsignedFloat('avg_interaction_rate')->comment('互動率');
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
        Schema::dropIfExists('youtube_media_details');
    }
}
