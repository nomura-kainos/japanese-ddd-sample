<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class 注文明細テーブル作成 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('注文明細', function (Blueprint $table) {
            $table->bigInteger('注文id');
            $table->bigInteger('行番号');
            $table->bigInteger('商品id');
            $table->string('商品名');
            $table->bigInteger('数量');
            $table->bigInteger('総額');
            $table->primary(['注文id', '行番号']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('注文明細');
    }
}
