<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id_category', 'dacbiet', 'luotxem', 'ngaylap', 'mota', 'chitiet'];

    public function ctProducts()
    {
        return $this->hasMany(CtProduct::class, 'idproduct', 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'id_category','id');
    }
    public function ctBills()
    {
        return $this->hasMany(CtBill::class, 'idproduct');
    }
}
