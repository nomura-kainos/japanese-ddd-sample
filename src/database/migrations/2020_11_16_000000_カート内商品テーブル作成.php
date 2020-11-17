<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class カート内商品テーブル作成 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('カート内商品', function (Blueprint $table) {
            $table->integer('カートid');
            $table->integer('商品id');
            $table->integer('数量');
            $table->boolean('注文済みか')->default(false);
            $table->primary(['カートid', '商品id']);
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
        Schema::dropIfExists('カート内商品');
    }
}
