<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolClassable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('kolclassables', function (Blueprint $table) {
		    $table->unsignedInteger('kol_id');
		    $table->char('kolclassable_type',255)->comment('多態關聯 model name');
		    $table->unsignedInteger('kolclassable_id')->comment('多態關聯 id');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
	    Schema::dropIfExists('kolclassables');
    }
}
