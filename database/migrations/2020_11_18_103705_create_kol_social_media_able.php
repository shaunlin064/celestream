<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolSocialMediaAble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kol_social_media_ables', function (Blueprint $table) {
	        $table->unsignedInteger('kol_social_media_id');
	        $table->char('kol_social_media_ables_type',255)->comment('多態關聯 model name');
	        $table->unsignedInteger('kol_social_media_ables_id')->comment('多態關聯 id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kol_social_media_ables');
    }
}
