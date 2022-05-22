<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropositionLivreur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposition_livreurs', function (Blueprint $table) {
            $table->id();
            $table->string('temps');
            $table->string('prix');
            $table->foreignId('id_user')->constrained('id')->on('users');
            $table->foreignId('id_commande')->constrained('id')->on('commandes');
            $table->foreignId('id_livreur')->constrained('id')->on('livreurs');


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
        Schema::dropIfExists('proposition_livs');
    }
}
