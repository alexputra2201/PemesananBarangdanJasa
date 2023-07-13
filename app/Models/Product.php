<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function PemesananBarang(){
        return $this->hasMany(PemesananJasa::class);
    }

    public function kursis(){
        return $this->hasMany(Kursi::class);
    }
  
}