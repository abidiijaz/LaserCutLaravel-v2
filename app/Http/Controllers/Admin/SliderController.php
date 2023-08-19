<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function AddSlider(Request $request){
        $slider = new Slider();
        $slider->name = $request->name;
        $slider->deal = $request->category;
        $slider->price = $request->price;
        $slider->label = $request->subValue;
        $slider->Keyword = $request->Keyword;
        if($request->status == null){
            $slider->status = '0';
        }else{
            $slider->status = $request->status;
        }
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/ab_admin/slider/'.$filename));
            // Image::make($avatar)->resize(300,300)->save(public_path('/ab_admin/slider/'.$filename));
            $slider->image = $filename;
            $slider->save();
        }
        $slider->save();
        return redirect('/admin/slider');
    }
    public function EditSlider(Request $request){
        $slider = Slider::find($request->id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function UpdateSlider(Request $request){
        
        $slider = Slider::find($request->id);
        $slider->name = $request->name;
        $slider->deal = $request->category;
        $slider->price = $request->price;
        $slider->label = $request->subValue;
        $slider->Keyword = $request->Keyword;
        
        if($request->status == 'on'){
            $slider->status = 1;
        }else{
            $slider->status = 0;
        }
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/ab_admin/slider/'.$filename));
            // Image::make($avatar)->resize(300,300)->save(public_path('/ab_admin/slider/'.$filename));
            $slider->image = $filename;
            $slider->save();
        }
        $slider->save();
        return redirect('/admin/slider');
    }
    public function DeleteSlider(Request $request){
        $slider = Slider::where('id',$request->id)->first();
        $slider->delete();
        return redirect('admin/slider');
    }
    public function updateStatus(Request $request)
{
    $sliderId = $request->input('id');
    $status = $request->input('status');

    $slider = Slider::find($sliderId);

    if ($slider) {
        $slider->status = $status;
        $slider->save();

        return response()->json(['message' => 'Slider status updated successfully']);
    } else {
        return response()->json(['message' => 'Slider not found'], 404);
    }
}
}
