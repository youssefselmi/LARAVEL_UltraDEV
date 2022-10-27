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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->String('nom_session');
            $table->Date('date_session');
            $table->integer('capacite');
            $table->timestamps();
          //  $table->foreignId('formation_id')->on('formations')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('formation_id')
            ->references('id')->on('formations')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
