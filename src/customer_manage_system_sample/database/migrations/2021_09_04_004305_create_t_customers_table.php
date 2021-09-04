<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_customers', function (Blueprint $table) {
            $table->id()->comment('顧客ID');
            $table->string('customer_name', 50)->comment('顧客名');
            $table->string('customer_name_kana', 100)->comment('顧客名かな');
            $table->integer('sex')->comment('性別（1:男性、2:女性）');
            $table->date('birthday')->comment('生年月日');
            $table->string('tel_home', 10)->comment('電話番号（家）');
            $table->string('tel_celler', 11)->comment('電話番号（携帯）');
            $table->string('e_mail', 100)->comment('メールアドレス');
            $table->string('post_code', 8)->comment('郵便番号');
            $table->string('address')->comment('住所');
            $table->string('address_kana')->comment('住所かな');
            $table->integer('status')->comment('ステータス（1:新規、2:処理中、3:完了）');
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
        Schema::dropIfExists('t_customers');
    }
}
