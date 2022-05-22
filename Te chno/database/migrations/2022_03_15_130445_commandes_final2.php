<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommandesFinal2 extends Migration
{
         /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('commandes_f', function (Blueprint $table) {
                $table->id();

                
               
                $table->foreignId('id_commande')->constrained('id')->on('commandes');
                $table->foreignId('id_restaurant')->constrained('id')->on('restaurants');
                $table->foreignId('id_produit')->constrained('id')->on('produits');
                $table->foreignId('id_user')->constrained('id')->on('users');
                $table->foreignId('id_livreur')->constrained('id')->on('livreurs');
                $table->integer('confirmation');
                $table->string('prix');
                $table->string('temps');


    
    
    
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
            Schema::dropIfExists('commandes');
        }
}
