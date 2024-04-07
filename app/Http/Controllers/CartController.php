<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\CtProduct;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
class CartController extends Controller
{
    //
    public function getIndex(){
        return view('home.cart');
    }
    public function getCartInfo(){
        $cart = Session::get('cart', []);
        $user = auth()->user();
        $sum = 0;
        foreach ($cart as $cartItem) {
            $total = \App\Function\Help::total($cartItem['price'], $cartItem['giamgia'], $cartItem['soluongmua']);
            $sum += $total;
        }

        $fsum = \App\Function\Help::formatVND($sum);
        return view('home.checkout',['cart' =>  $cart,'fsum'=>$fsum,'user'=>$user]);
    }
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
    }
    public function addToCart(Request $request)
    {
        // session()->flush();
        $selectedSize = $request->input('checksize');
        $selectedColor = $request->input('checkcolor');
        $selectedId = $request->input('checkid');
        $soluongmua = $request->input('soluong');
    
        $ctProduct = CtProduct::where('idproduct', $selectedId)
            ->where('idsize', $selectedSize)
            ->where('idcolor', $selectedColor)
            ->first();
    
        if (!$ctProduct) {
            return redirect()->route('home.get.cart')->with('error', 'Product not found');
        }
    
        $maxSL = $ctProduct->soluongton;
        $product = Product::find($selectedId);
        $size = Size::find($selectedSize)->size;
        $color = Color::find($selectedColor)->color;
        $price = $ctProduct->price;
        $image = $ctProduct->image;
        $giamgia = $ctProduct->giamgia;
        $name = $product->name;
    
        $cart = Session::get('cart', []);
        $cartItem = [
            'idsize' => $selectedSize,
            'idcolor' => $selectedColor,
            'idproduct' => $selectedId,
            'soluongmua' => $soluongmua,
            'image' => $image,
            'price' => $price,
            'giamgia' => $giamgia,
            'name' => $name,
            'nameSize' => $size,
            'nameColor' => $color,
        ];
    
        $existingItemIndex = collect($cart)->search(function ($item) use ($selectedSize, $selectedColor, $selectedId) {
            return $item['idsize'] == $selectedSize && $item['idcolor'] == $selectedColor && $item['idproduct'] == $selectedId;
        });
    
        if ($existingItemIndex !== false) {
            // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $cart[$existingItemIndex]['soluongmua'] += $soluongmua;
                echo '<pre>';
                var_dump( $cart[$existingItemIndex]['soluongmua']);
                echo '</pre>';
                var_dump($maxSL);
                Session::put('cart', $cart);
            // Kiểm tra xem số lượng mới có vượt quá giới hạn không
            if ($cart[$existingItemIndex]['soluongmua'] > $maxSL) {
                // Nếu vượt quá giới hạn, giảm số lượng lại và thông báo
                $cart[$existingItemIndex]['soluongmua'] = $maxSL;
                Session::put('cart', $cart);
                echo '<pre>';
                var_dump(Session::get('cart', []));
                echo '</pre>';

                return redirect()->route('home.get.cart')->with('error', 'Exceeds maximum quantity');
            }
        } else {
            // Sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào
            $cart[] = $cartItem;
        }
    
        Session::put('cart', $cart);
    
        // Chuyển hướng hoặc trả về thông báo thành công tùy thuộc vào logic của bạn
        return redirect()->route('home.get.cart')->with('success', 'Added to cart successfully');
    }
    public function cartMinus($index){
        $cart = Session::get('cart', []);
        if( $cart[$index]['soluongmua']>=2){
            $cart[$index]['soluongmua']--;
            Session::put('cart', $cart);
            return redirect()->route('home.get.cart')->with('success', 'Minus to cart successfully');
        }else{
            $cart[$index]['soluongmua']=1;
            Session::put('cart', $cart);
            return redirect()->route('home.get.cart')->with('error', 'Minus to cart fail');
        }
    }
    public function cartPlus($index){
        $cart = Session::get('cart', []);
        $selectedId=$cart[$index]['idproduct'];
        $selectedSize=$cart[$index]['idsize'];
        $selectedColor=$cart[$index]['idcolor'];
        $ctProduct = CtProduct::where('idproduct', $selectedId)
            ->where('idsize', $selectedSize)
            ->where('idcolor', $selectedColor)
            ->first();
        $maxSL = $ctProduct->soluongton;
        if( $cart[$index]['soluongmua']<$maxSL){
            $cart[$index]['soluongmua']++;
            Session::put('cart', $cart);
            return redirect()->route('home.get.cart')->with('success', 'Plus to cart successfully');
        }else{
            $cart[$index]['soluongmua']=$maxSL;
            Session::put('cart', $cart);
            return redirect()->route('home.get.cart')->with('error', 'Plus to cart fail');
        }
    }
    public function cartDel($index)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart); // Reset lại index của mảng
            Session::put('cart', $cart);
            return redirect()->route('home.get.cart')->with('success', 'Deleted from cart successfully');
        }
        return redirect()->route('home.get.cart')->with('error', 'Error while trying to delete from cart');
    }
    public function getPayment(){
        return view('home.payment');
    }
    public function submit(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->route('payment')->with('success', 'Đặt hàng thành công!');
    }
}
