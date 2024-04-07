<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = ['color'];
    public function ctProducts()
    {
        return $this->hasMany(CtProduct::class, 'idcolor', 'id');
    }
    public function ctBills()
    {
        return $this->hasMany(CtBill::class, 'idcolor');
    }
}
