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
        Schema::create('c_exps', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('cposition');
            $table->string('ccompany');
            $table->string('cdate');
            $table->longText('sdesc');
            $table->string('ccountry');
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
        Schema::dropIfExists('c_exps');
    }
};