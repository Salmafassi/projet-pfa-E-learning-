<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        
        'dateCreation',
        'formation_id'
    ];
    public function formation(){
        return $this->belongsTo(Formation::class);
    }
    public function lessons(){
       return $this->hasMany(Lesson::class);
    }
}
