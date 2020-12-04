<?php
declare(strict_types=1);

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class 特集テーブル作成 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('特集', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('タイトル');
        });

        DB::statement('ALTER TABLE 特集 ADD 本文 MEDIUMBLOB');

        Schema::table('特集', function (Blueprint $table) {
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
        Schema::dropIfExists('特集');
    }
}
