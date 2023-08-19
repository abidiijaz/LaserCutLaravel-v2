<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Models\PopulerCategory;

class PopulerCategoryController extends Controller
{
    public function index(){
        // $sliders = Slider::get();
        $categories = ProductCategory::get();
        $pcategories = PopulerCategory::with('getCategory')->get();
        
        return view('admin.populerCategory.index',compact('categories','pcategories'));
    }
    public function AddPopulerCategory(Request $request){

        $checkCategory = PopulerCategory::where('category_id',$request->category_id)->first();
        if($checkCategory == null){
            $populer = new PopulerCategory();
            $populer->category_id = $request->category_id;
            
            if($request->status == null){
                $populer->status = '0';
            }else{
                $populer->status = 1;
            }
            
            $populer->save();
            return redirect('/admin/populer-category')->with('success','Populer Category Added Successfully!');
        }
        return redirect('/admin/populer-category')->with('error','This Populer Category exits in Table!');
        
    }
   
    public function UpdateSlider(Request $request){

        // $slider = Slider::find($request->id);
        // $slider->name = $request->name;
        // $slider->deal = $request->category;
        // $slider->price = $request->price;
        // $slider->label = $request->subValue;
        // $slider->Keyword = $request->Keyword;

        // if($request->status == 'on'){
        //     $slider->status = 1;
        // }else{
        //     $slider->status = 0;
        // }
        // if($request->hasFile('image')){
        //     $avatar = $request->file('image');
        //     $filename = time().'.'.$avatar->getClientOriginalExtension();
        //     Image::make($avatar)->save(public_path('/ab_admin/slider/'.$filename));
        //     // Image::make($avatar)->resize(300,300)->save(public_path('/ab_admin/slider/'.$filename));
        //     $slider->image = $filename;
        //     $slider->save();
        // }
        // $slider->save();
        // return redirect('/admin/slider');
    }
    public function DeletePopulerCategory(Request $request){
        $slider = PopulerCategory::where('id',$request->id)->first();
        $slider->delete();
        return redirect('admin/populer-category');
    }
    public function updateStatus(Request $request)
{
    $sliderId = $request->input('id');
    $status = $request->input('status');

    $slider = PopulerCategory::find($sliderId);

    if ($slider) {
        $slider->status = $status;
        $slider->save();

        return response()->json(['message'=>'Status Changed Successfully!']);
    } else {
        return response()->json(['message' => 'Slider not found'], 404);
    }
}
}
