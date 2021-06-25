<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_jual','created_by','kategori_jual','foto_jual','status_jual','harga_jual'
    ];
}
