<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Menentukan nama tabel, jika berbeda dengan default (plural)
    protected $table = 'products';

    // Menentukan kolom mana yang boleh diisi secara mass-assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    // Menentukan kolom yang harus di-cast ke tipe data tertentu (optional)
    protected $casts = [
        'price' => 'decimal:2',
    ];

    // Jika Anda ingin membuat relasi dengan model lain, seperti kategori atau tag, bisa menambah relasi di sini
}
