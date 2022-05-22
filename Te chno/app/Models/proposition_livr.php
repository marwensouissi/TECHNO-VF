<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proposition_livr extends Model
{
    use HasFactory; 
    
    protected $fillable = [ 
        'id',
        'prix',
        'id_commande',
        'id_livreur',
        'temps',
        'created_at',
        'updated_at',
        'deleted_at',
        
        
    ];
    public function commandes()
    {
        return $this->hasOne(commande::class, 'id', 'id_commande');
    }
    public function livreurs()
    {
        return $this->hasOne(livreur::class, 'id', 'id_livreur');
    }


}
