<?php 
namespace App\Function;

class Help
{
    public static function tinhGiamGia($price, $discount)
    {
        $giam = $price - ($price * ($discount / 100));
        // Làm tròn số và định dạng theo tiền tệ Việt Nam
        return self::formatVND($giam);
    }
    public static function formatVND($price){
        return number_format(round($price, -3), 0, ',', '.');
    }
    public static function total($price, $discount,$sl)
    {
        $total= ($price - ($price * ($discount / 100)))*$sl;
        return $total;
    }
}
?>