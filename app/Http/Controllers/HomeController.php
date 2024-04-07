<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\CtProduct;
class HomeController extends Controller
{
    //
    public function getIndex(){
        $ctgy = DB::table('categories')->get();
        $slider=DB::table('sliders')->get();
        $productedNew=Product::with('ctProducts')->orderByDesc('id')->take(8)->get();
        $productedHot = Product::with('ctProducts')->where('dacbiet',1)->orderBy('id')->groupBy('id')->take(8)->get();
        $productedAoDai = Product::with(['ctProducts', 'category'])
        ->whereHas('category', function ($query) {
            $query->where('name', 'Áo Dài');
        })
        ->orderBy('id')
        ->take(8)
        ->get();

        return view('home.home', ['ctgy' => $ctgy,'slider'=>$slider,'productedNew'=>$productedNew,'productedHot'=>$productedHot,'productedAoDai'=> $productedAoDai]);
    }
    public function getCart(){
        return view('home.cart',[]);
    }
    public function getDetail(Request $request, $productId){
        $product = Product::findOrFail($productId);
        $colors=Color::get();
        $sizes=Size::get();
        $productedForYou = CtProduct::with('product')
        ->where('soluongton', '<', 10)
        ->orderByDesc('idproduct')
        ->limit(4)
        ->get();
        
    
    
        // Lấy thông tin kích thước và màu sắc từ request hoặc session (tùy thuộc vào cách bạn lưu trữ)
        $selectedSize = $request->input('size') ?? optional($product->ctProducts->first())->idsize;
        $selectedColor = $request->input('color') ?? optional($product->ctProducts->first())->idcolor;
        
        // Lấy thông tin chi tiết sản phẩm tương ứng với kích thước và màu sắc được chọn
        $selectedProduct = $product->ctProducts()
        ->where('idsize', $selectedSize)
        ->where('idcolor', $selectedColor)
        ->first();

        return view('home.detail', ['product' => $product, 'selectedProduct' => $selectedProduct,'selectedSize'=>$selectedSize,'selectedColor'=>$selectedColor,
        'colors'=>$colors,
        'sizes'=>$sizes,
        'productedForYou'=>$productedForYou,
    ]);
    }
    public function getShop(Request $request)
    {
        $dsColor = DB::table('colors')->get();
        $dsSize = DB::table('sizes')->get();
        $idCatalog = $request->query('idcatalog');
        $idColor = $request->query('idcolor');
        $idSize = $request->query('idsize');
        // Xử lý hiển thị sản phẩm với bộ lọc từ idCatalog, idColor, idSize
        $query = Product::with(['ctProducts' => function ($query) use ($idColor, $idSize) {
            if ($idColor>0) {
                $query->where('idcolor', $idColor);
            }
    
            if ($idSize>0) {
                $query->where('idsize', $idSize);
            }
        }]);
    
        // Thêm điều kiện cho idCatalog nếu được truyền vào
        if ($idCatalog>0) {
            $query->where('id_category', $idCatalog);
        }
        // Lấy danh sách sản phẩm sau khi áp dụng bộ lọc hoặc mặc định hiển thị tất cả sản phẩm
        $products = $query->orderByDesc('id')->get();
    
        return view('home.shop', compact('dsColor', 'dsSize', 'products'));
    }
    
    
}
