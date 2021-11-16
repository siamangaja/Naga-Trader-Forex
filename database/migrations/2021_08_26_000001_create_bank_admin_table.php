<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('bank_admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank');
            $table->string('number');
            $table->string('account_name');
            $table->integer('status')->default(1); //0 = inactive; 1 = active;
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
        Schema::dropIfExists('bank_admin');
    }
}