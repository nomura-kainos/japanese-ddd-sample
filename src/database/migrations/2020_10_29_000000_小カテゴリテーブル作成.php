<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class 小カテゴリテーブル作成 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('小カテゴリ', function (Blueprint $table) {
            $table->bigInteger('大カテゴリid');
            $table->bigInteger('小カテゴリid');
            $table->string('名前');
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
        Schema::dropIfExists('小カテゴリ');
    }
}
