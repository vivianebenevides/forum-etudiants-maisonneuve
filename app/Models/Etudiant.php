<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    //protected $table = 'etudiants'; 

    protected $fillable = [
        'name',
        'adresse',
        'phone',
        'email',
        'date_de_naissance',
        'ville_id',
    ]; 

    public function etudiantHasVille()
    {
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    

}
