<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [ 
        
        'user_id',
        'restaurant_id',
        'produit_id',
        'lat',
        'lng',




        'created_at',
        'updated_at',
        'deleted_at',
        
    ];





    public function users()
    {
        return $this->hasOne(user::class, 'id', 'id_user');
    }


    public function restaurants()
    {
        return $this->hasOne(restaurant::class, 'id', 'id_restaurant');
    }



    public function livreurs()
    {
        return $this->hasMany(livreur::class, 'id', 'id_livreur');
    }

    public function commandes()
    {
        return $this->hasMany(commande::class, 'id', 'commande_id');
    }

}


