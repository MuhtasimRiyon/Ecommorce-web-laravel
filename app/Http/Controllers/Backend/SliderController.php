<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function SliderView(){
        $slider = Slider::latest()->get();
        return view ('backend.slider.slider_view',compact('slider'));
    }

    public function SliderStore(Request $request){
        $request->validate([
            'slider_img' => 'required',
        ],[
            'slider_img.required' => 'Image is required',
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
        ]);

        return redirect()->back();

    }

    public function SliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view ('backend.slider.slider_edit',compact('slider'));
    }

    public function SliderUpdate(Request $request){
        $slider_id = $request->id;
        $old_img = $request->old_img;

        if($request->file('slider_img')){
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);

            return redirect()->route('manage.slider');

        }else{
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->route('manage.slider');
        }
    }

    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img;
        unlink($img);

        Slider::findOrFail($id)->delete();

        return redirect()->back();

    }

    public function InActiveSlider($id){
        Slider::findOrFail($id)->update([
            'status' => 0
        ]);

        return redirect()->back();
    }

    public function ActiveSlider($id){
        Slider::findOrFail($id)->update([
            'status' => 1
        ]);

        return redirect()->back();
    }

}
