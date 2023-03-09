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
        Schema::create('c_skills', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->longText('sdesc');
            $table->string('washing')->default('0');
            $table->string('cleaning')->default('0');
            $table->string('ironing')->default('0');
            $table->string('sewing')->default('0');
            $table->string('cooking')->default('0');
            $table->string('baby_care')->default('0');
            $table->string('english')->default('0');
            $table->string('arabic')->default('0');
            $table->string('mandarin')->default('0');
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
        Schema::dropIfExists('c_skills');
    }
};
