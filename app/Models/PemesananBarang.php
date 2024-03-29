<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananBarang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kursi()
    {
        return $this->belongsTo(Kursi::class);
    }
}