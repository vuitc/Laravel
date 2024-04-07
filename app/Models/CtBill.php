<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtBill extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class, 'idproduct');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'idsize');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'idcolor');
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'masohd');
    }
}
