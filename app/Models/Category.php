<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Note;
use App\Models\Day;

class Category extends Model
{
    protected $fillable = [];
    protected $guarded = [];
    
    use HasFactory;


    public function note(){
        return $this->hasMany(Note::class);
    }

    public function day(){
        return $this->hasOne(Day::class);
    }


   
}
