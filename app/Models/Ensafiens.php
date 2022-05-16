<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensafiens extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'niveau',
        
        'telephone'
    ];
   
}
