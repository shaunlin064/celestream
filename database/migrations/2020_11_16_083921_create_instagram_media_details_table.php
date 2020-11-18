<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstagramMediaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instagram_media_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tracks_count')->comment('追蹤數');
	        $table->unsignedFloat('avg_likes_count')->comment('平均按讚');
	        $table->unsignedFloat('avg_comment_count')->comment('平均留言');
	        $table->unsignedFloat('avg_interaction_count')->comment('平均互動');
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
        Schema::dropIfExists('instagram_media_details');
    }
}
