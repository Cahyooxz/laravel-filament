<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function Barang(){
        return $this->hasMany(Barang::class);
    }
}
