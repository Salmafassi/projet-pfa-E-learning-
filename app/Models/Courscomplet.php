<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courscomplet extends Model
{
    use HasFactory;
    protected $fillable=[
        
        'created_at',
        'lesson_id',
        'subscriber_id',
        
        
    ];
    public function subscriber(){
        return $this->belongsTo(Subscriber::class);
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
