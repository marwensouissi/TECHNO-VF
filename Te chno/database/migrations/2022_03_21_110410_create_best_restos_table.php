<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestRestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('best_restos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('id')->on('users');
            $table->foreignId('id_resto')->constrained('id')->on('restaurants');
            $table->string('nom');
            $table->string('numéro_tel');
            $table->string('adresse');
            $table->string('etat');
            $table->string('image');
            $table->string('statut');

        





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
        Schema::dropIfExists('restaurants');
    }
}
