<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'status',
        'dateCreation',
        'type',
        'fichier',
        'formation_id',
        
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function chapters(){
        return $this->hasMany(Chapter::class);
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
