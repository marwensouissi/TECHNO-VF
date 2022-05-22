<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livreur extends Model

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
            'numéro_tel',
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
    
