<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
  
    protected $guarded = ['tags','genres','pegis'];


    public function publisher(){
        return $this->belongsTo(Publisher::class); 
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
    public function pegis(){
        return $this->belongsToMany(Pegi::class);
      
    }
    public function genres(){
        return $this->belongsToMany(Genre::class);

    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
