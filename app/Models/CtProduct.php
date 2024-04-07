<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtProduct extends Model
{
    use HasFactory;
    protected $fillable = ['idproduct', 'idcolor', 'idsize', 'price', 'soluongton', 'image', 'giamgia'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'idproduct', 'id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'idcolor', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'idsize', 'id');
    }
}
