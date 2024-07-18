<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'gambar',
        'penulis',
        'tahun',
        'deskripsi',
    ];

    public $timestamps = true;
}
