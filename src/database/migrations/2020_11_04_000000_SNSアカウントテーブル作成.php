<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SNSアカウントテーブル作成 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SNSアカウント', function (Blueprint $table) {
            $table->string('SNS名');
            $table->string('SNSアカウントid');
            $table->bigInteger('ユーザid');
            $table->foreign('ユーザid')->references('id')->on('ユーザ');
            $table->primary(['SNS名', 'SNSアカウントid']);
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
        Schema::dropIfExists('SNSアカウント');
    }
}
