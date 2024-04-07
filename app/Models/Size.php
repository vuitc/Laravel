<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = ['size'];
    public function ctProducts()
    {
        return $this->hasMany(CtProduct::class, 'idsize', 'id');
    }
    public function ctBills()
    {
        return $this->hasMany(CtBill::class, 'idsize');
    }
}
