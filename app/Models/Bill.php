<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'makh');
    }
    public function ctBills()
    {
        return $this->hasMany(CtBill::class, 'masohd');
    }
}
