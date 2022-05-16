<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends User
{ 
    public static function boot(){
        parent::boot();
        static::creating(function($etudiant){
            $etudiant->forceFill(['type'=>self::class]);
        });
    }
public static function booted(){
    static::addGlobalScope('etudiant',function($builder){
$builder->where('type',self::class);
    });
}
  
protected $fillable=[
    'name',
        'email',
        'password',
        'prenom',
        
        'telephone', 
        'niveau'
];
    //use HasFactory;
}
