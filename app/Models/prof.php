<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User;

class prof extends User
{
    public static function boot(){
        parent::boot();
        static::creating(function($prof){
            $prof->forceFill(['type'=>self::class]);
        });
    }
public static function booted(){
    static::addGlobalScope('prof',function($builder){
       $builder->where('type',self::class);
    });
}
protected $fillable=[
        'name',
        'email',
        'password',
        'prenom',
        'spécialité',
        'telephone' 
        
];


   // use HasFactory;
}
