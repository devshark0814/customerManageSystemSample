<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_contracts', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->comment('顧客ID');
            $table->integer('employee_id')->comment('担当者ID');
            $table->string('contract_title')->comment('契約タイトル');
            $table->text('contract_desc')->comment('契約説明');
            $table->integer('status')->comment('ステータス（1:新規 2:着手中 3:確認中 4:完了）');
            $table->integer('progress')->comment('進捗率');
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
        Schema::dropIfExists('t_contracts');
    }
}
