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
        Schema::create('nlineups', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('fra_username');
            $table->string('fra_name');
            $table->string('position');
            $table->string('offer_status')->default('0');
            $table->string('status');
            $table->string('account_officer');
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
        Schema::dropIfExists('nlineups');
    }
};
