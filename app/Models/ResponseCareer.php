<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseCareer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
