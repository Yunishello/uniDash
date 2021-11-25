<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trans', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('product_name');
            $table->string('phone');
            $table->integer('amount');
            $table->json('trans_date');
            $table->foreignId('users_id');
            $table->string('reqId');
            $table->rememberToken();
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
        Schema::dropIfExists('user_trans');
    }
}
