<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory; 
    
    protected $fillable = [ 
        'nom',
        'id_categorie',
        'image',
        'prix',
        'etat',
        'created_at',
        'updated_at',
        'deleted_at',
        'id',
        
    ];
    public function categories()
    {
        return $this->hasOne(categorie::class, 'id', 'id_categorie');
    }

    
    public function restaurants()
    {
        return $this->hasOne(restaurant::class, 'id', 'id_restaurant');
    }
}
