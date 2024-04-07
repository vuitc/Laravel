<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
class SliderController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index')->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }
    public function show($id)
    {
        //
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.show', ['slider' => $slider]);
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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title1' => 'nullable|string|max:255',
            'title2' => 'nullable|string|max:255',
            'truong' => 'required|integer|between:1,3',
        ]);

        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('eshoe/img'), $imageName);

        $slider = new Slider([
            'img' => $imageName,
            'title1' => $request->get('title1'),
            'title2' => $request->get('title2'),
            'truong' => $request->get('truong'),
        ]);
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit')->with('slider', $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title1' => 'nullable|string|max:255',
            'title2' => 'nullable|string|max:255',
            'truong' => 'required|integer|between:1,3',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('eshoe/img'), $imageName);
            $slider->img = $imageName;
        }

        $slider->title1 = $request->get('title1');
        $slider->title2 = $request->get('title2');
        $slider->truong = $request->get('truong');
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully');
    }
}
