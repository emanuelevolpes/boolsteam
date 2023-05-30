<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
    public function pegis(){
        return $this->belongsToMany(Pegi::class);
      
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
