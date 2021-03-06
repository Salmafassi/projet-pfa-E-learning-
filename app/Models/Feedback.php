<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //use HasFactory;
    protected $fillable=[
        'description',
        
        'dateCreation',
        'type',
        'user_id',
        'formation_id',
        
    ];
    public function formation(){
        return $this->belongsTo(Formation::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
