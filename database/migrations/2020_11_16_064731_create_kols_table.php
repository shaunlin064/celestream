<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kols', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('third_party_id')->unique()->comment('第三方來源id');
	        $table->char('name',255)->comment('名稱');
	        $table->text('introduction')->comment('kol自我簡介');
	        $table->unsignedTinyInteger('created_at_mark')->nullable()->comment('最近一次完成更新資料日期 每週一為一個階段');
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
        Schema::dropIfExists('kols');
    }
}
