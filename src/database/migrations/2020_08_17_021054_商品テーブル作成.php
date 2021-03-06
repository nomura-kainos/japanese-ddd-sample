<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class 商品テーブル作成 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('商品', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('名前');
            $table->bigInteger('レンタル料金');
            $table->bigInteger('大カテゴリid');
            $table->bigInteger('小カテゴリid');
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
        Schema::dropIfExists('商品');
    }
}
