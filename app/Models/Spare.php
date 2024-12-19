<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spare extends Model
{
    // Table name (optional, only if the table name is not the plural form of the model)
    // protected $table = 'spares';

    // Specify which attributes are mass assignable (this can be modified based on your use case)
    protected $fillable = [
        'name', 
        'price', 
        'stock'
    ]; // Add the actual fields you want to allow mass assignment for

    // If the table uses timestamps (created_at and updated_at)
    public $timestamps = true;

    // Optionally, you can define relationships, e.g., if it has a category:
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
