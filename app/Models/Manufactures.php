<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufactures extends Model
{
    use HasFactory;
    // protected $table = "manufactures";
    public function cars(){
        return $this->hasMany(Car::class);
    }
}
