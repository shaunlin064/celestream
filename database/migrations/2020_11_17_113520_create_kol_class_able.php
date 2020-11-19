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
	    Schema::create('kol_class_ables', function (Blueprint $table) {
		    $table->unsignedInteger('kol_id');
		    $table->char('kol_class_ables_type',255)->comment('多態關聯 model name');
		    $table->unsignedInteger('kol_class_ables_id')->comment('多態關聯 id');
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
	    Schema::dropIfExists('kol_class_ables');
    }
}
