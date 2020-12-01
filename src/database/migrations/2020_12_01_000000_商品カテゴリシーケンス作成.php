<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class 商品カテゴリシーケンス作成 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('商品カテゴリシーケンス', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
        });
        DB::table('商品カテゴリシーケンス')->insert([
            ['id' => 0],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('商品カテゴリシーケンス');
    }
}
