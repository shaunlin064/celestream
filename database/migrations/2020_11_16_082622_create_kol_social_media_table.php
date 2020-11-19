<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kol_social_media', function (Blueprint $table) {
            $table->id();
	        $table->unsignedInteger('kol_id');
	        $table->char('social_media_name',100)->comment('社交平台名稱');
	        $table->text('social_media_url')->comment('社交平台url');
	        $table->text('image_url')->comment('社交平台圖片url');
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
        Schema::dropIfExists('kol_social_media');
    }
}
