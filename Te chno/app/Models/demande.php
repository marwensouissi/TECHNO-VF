<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demande extends Model
{






    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [ 
        'nom',
        'adresse',
        'etat',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
        
    ];


    public function users()
    {
        return $this->hasOne(user::class, 'id', 'id_user')->cascadeOnDelete()->cascadeOnUpdate();
    }
    
}


