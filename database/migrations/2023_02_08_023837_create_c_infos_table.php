<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_infos', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('fullname');
            $table->string('email');
            $table->string('pw');
            $table->string('account_officer');
            $table->string('status');
            $table->string('remarks');
            $table->string('allowed');
            $table->string('category')->default(0);
            $table->string('passport_no')->default(000);
            $table->string('pra');
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
        Schema::dropIfExists('c_infos');
    }
};
