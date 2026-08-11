<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_kategori', 'id');
    }
}
