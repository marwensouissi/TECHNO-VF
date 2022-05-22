<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandes_f extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [ 
        'lat',
        'lng',
        'lat',
        'user_id',
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
        return $this->hasMany(restaurant::class, 'id', 'id_restaurant');
    }


    public function produits()
    {
        return $this->hasMany(produit::class, 'id', 'id_produit');
    }
}
