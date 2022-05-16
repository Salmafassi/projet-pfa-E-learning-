<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends User
{
    public static function boot(){
        parent::boot();
        static::creating(function($admin){
            $admin->forceFill(['type'=>self::class]);
        });
    }
public static function booted(){
    static::addGlobalScope('admin',function($builder){
$builder->where('type',self::class);
    });
}
protected $fillable=[
    'name',
        'email',
        'password',
        'prenom',
        
        'telephone', 
        'c'
];
    //use HasFactory;
}
