<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class 注文シーケンス作成 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('注文シーケンス', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
        });
        DB::table('注文シーケンス')->insert([
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
        Schema::dropIfExists('注文シーケンス');
    }
}
