<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('kodeOrder');
        $table->date('tglOrder');
        $table->string('namaPembeli');
        $table->string('noTelepon');
        $table->string('alamat');
        $table->string('barangId');
        $table->integer('jumlahOrder');
        $table->string('keterangan');
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
        //
    }
};
