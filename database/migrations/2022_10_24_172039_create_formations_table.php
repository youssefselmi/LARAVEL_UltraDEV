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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->String('nom');
            $table->String('description');
            $table->String('mail_formateur');
            $table->String('nom_formateur');
            $table->String('formateur_profession');
            $table->String('image');
            $table->String('location_formation');
            $table->integer('prix_formation');
            $table->String('duree_formation');
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
        Schema::dropIfExists('formations');
    }
};
