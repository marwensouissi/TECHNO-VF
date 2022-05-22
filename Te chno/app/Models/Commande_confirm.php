<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_confirm extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne(user::class, 'id', 'id_user');
    }


    public function restaurants()
    {
        return $this->hasOne(restaurant::class, 'id', 'id_restaurant');

    }


    public function produits()
    {
        return $this->hasOne(produit::class, 'id', 'id_produit');
    }

    
    public function commande_fs()
    {
        return $this->hasMany(commandes_f::class, 'id', 'id_commande_final');
    }

}
