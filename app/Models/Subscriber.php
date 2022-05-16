<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    protected $fillable=[
        
        'created_at',
        'user_id',
        'formation_id',
        'progress'
        
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function formation(){
        return $this->belongsTo(Formation::class);
    }
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}
