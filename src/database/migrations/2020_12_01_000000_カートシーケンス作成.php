<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class カートシーケンス作成 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('カートシーケンス', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
        });
        DB::table('カートシーケンス')->insert([
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
        Schema::dropIfExists('カートシーケンス');
    }
}
