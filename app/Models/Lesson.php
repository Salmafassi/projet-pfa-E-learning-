<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'dateCreation',
        'duréeFormation',
        'prix',
        'photo',
        'category_id',
        'prof_id'
    ];
    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class);
    }
}
