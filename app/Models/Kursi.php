<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function Pemesananbarang()
    {
        return $this->hasOne(PemesananBarang::class);
    }
}