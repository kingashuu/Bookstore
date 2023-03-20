<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data['sliders'] = Slider::latest()->get();
        return view('sliders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'sub_title' => 'required',
            'url_link' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        // $attributes['image'] = request()->file('image')->store('SlideImages',);
        $attributes['image'] = request()->file('image')->store('SliderImages',);

        // dd($attributes['image']);

        Slider::create($attributes);

        return redirect('admin/slider');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $data['slider'] = Slider::where('id', $id)->first();
        return view('sliders.show', $data)->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        $data['slider'] = $slider;
        return view('sliders.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Slider $slider)
    {
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'sub_title' => 'required',
            'url_link' => 'required',
            // 'image' => 'required|image',
            'status' => 'required',
        ]);
        if (isset($attributes['image'])) {
            $attributes['image'] = request()->file('image')->store('SliderImages',);
        }
        $slider->update($attributes);

        return redirect('admin/slider');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {

        if (Storage::exists($slider->image)) {
            Storage::delete($slider->image);
        }
        $slider->delete();
        return back();
    }
}
