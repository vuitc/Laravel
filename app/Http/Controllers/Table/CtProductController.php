<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CtProduct;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
class CtProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $ctProducts = CtProduct::all();
        $ctProducts = CtProduct::paginate(10);
        return view('admin.dproducts.index', ['ctProducts' => $ctProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('admin.dproducts.create', ['products' => $products, 'colors' => $colors, 'sizes' => $sizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idproduct' => 'required|exists:products,id',
            'idcolor' => 'required|exists:colors,id',
            'idsize' => 'required|exists:sizes,id',
            'price' => 'nullable|integer',
            'soluongton' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'giamgia' => 'nullable|integer',
        ]);

        $ctProduct = new CtProduct();
        $ctProduct->idproduct = $request->input('idproduct');
        $ctProduct->idcolor = $request->input('idcolor');
        $ctProduct->idsize = $request->input('idsize');
        $ctProduct->price = $request->input('price');
        $ctProduct->soluongton = $request->input('soluongton');
        $ctProduct->giamgia = $request->input('giamgia');

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('eshoe/img/'), $imageName);
            $ctProduct->image = $imageName;
        }

        $ctProduct->save();

        return redirect()->route('dproduct.index')->with('success', 'CtProduct created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idproduct, $idcolor, $idsize)
    {
        $ctProduct = CtProduct::where([
            'idproduct' => $idproduct,
            'idcolor' => $idcolor,
            'idsize' => $idsize,
        ])->first();

        if (!$ctProduct) {
            return redirect()->route('dproduct.index')->with('error', 'CtProduct not found');
        }
        return view('admin.dproducts.show', ['ctProduct' => $ctProduct]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idproduct, $idcolor, $idsize)
    {
        $ctProduct = CtProduct::where([
            'idproduct' => $idproduct,
            'idcolor' => $idcolor,
            'idsize' => $idsize,
        ])->first();

        if (!$ctProduct) {
            return redirect()->route('dproduct.index')->with('error', 'CtProduct not found');
        }

        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('admin.dproducts.edit', [
            'ctProduct' => $ctProduct,
            'products' => $products,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idproduct, $idcolor, $idsize)
    {
        $request->validate([
            'idproduct' => 'required|exists:products,id',
            'idcolor' => 'required|exists:colors,id',
            'idsize' => 'required|exists:sizes,id',
            'price' => 'nullable|integer',
            'soluongton' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'giamgia' => 'nullable|integer',
        ]);

        $ctProduct = CtProduct::where([
            'idproduct' => $idproduct,
            'idcolor' => $idcolor,
            'idsize' => $idsize,
        ])->first();

        if (!$ctProduct) {
            return redirect()->route('dproduct.index')->with('error', 'CtProduct not found');
        }

        $ctProduct->idproduct = $request->input('idproduct');
        $ctProduct->idcolor = $request->input('idcolor');
        $ctProduct->idsize = $request->input('idsize');
        $ctProduct->price = $request->input('price');
        $ctProduct->soluongton = $request->input('soluongton');
        $ctProduct->giamgia = $request->input('giamgia');

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('eshoe/img/'), $imageName);
            $ctProduct->image = $imageName;
        }

        $ctProduct->save();

        return redirect()->route('dproduct.index')->with('success', 'CtProduct updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idproduct, $idcolor, $idsize)
    {
        $ctProduct = CtProduct::where([
            'idproduct' => $idproduct,
            'idcolor' => $idcolor,
            'idsize' => $idsize,
        ])->first();

        if (!$ctProduct) {
            return redirect()->route('dproduct.index')->with('error', 'CtProduct not found');
        }

        CtProduct::where([
            'idproduct' => $idproduct,
            'idcolor' => $idcolor,
            'idsize' => $idsize,
        ])->delete();
        

        return redirect()->route('dproduct.index')->with('success', 'CtProduct deleted successfully');
    }
}
