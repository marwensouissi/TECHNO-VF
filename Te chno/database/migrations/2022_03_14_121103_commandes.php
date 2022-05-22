
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commandes extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('commandes', function (Blueprint $table) {
                $table->id();
                $table->double('lat');
                $table->double('lng');
                $table->foreignId('id_restaurant')->constrained('id')->on('restaurants');
                $table->foreignId('id_produit')->constrained('id')->on('produits');
                $table->foreignId('id_user')->constrained('id')->on('users');
              

    
    
    
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
    