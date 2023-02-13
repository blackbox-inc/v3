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
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('gender');
            $table->string('dob');
            $table->string('pob');
            $table->string('height');
            $table->string('weight');
            $table->string('religion');
            $table->string('blood_type');
            $table->string('marital_status');
            $table->string('no_of_children');
            $table->string('objectives');
            $table->string('photo')->default('default.jpg');
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
        Schema::dropIfExists('basic_infos');
    }
};
