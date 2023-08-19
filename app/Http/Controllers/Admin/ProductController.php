<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Image;

class ProductController extends Controller
{
    public function index(){
        $categories = ProductCategory::with('parentcategory')->get();
        $products = Product::with('getCategory')->get();
        return view('admin.product.index',compact('categories','products'));
    }
    public function AddProduct(Request $request){
        // dd($request->file('image')[0]);
        $image_array = array();
        $product = new Product();
        $product->title = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->full_description = $request->full_description;
        for($i=0; $i<count($request->image); $i++){
            if($request->hasFile('image')){
                $avatar = $request->file('image')[$i];
                $filename =rand().time().'.'.$avatar->getClientOriginalExtension();
                $sm_filename ='sm-'.$filename;
                Image::make($avatar)->resize(1200,1200)->save(public_path('/ab_admin/product/'.$filename));
                Image::make($avatar)->resize(300,300)->save(public_path('/ab_admin/product/'.$sm_filename));
                $image_array[$i] = $filename;
            }
        }
        $product->image = json_encode($image_array);
        if($request->status == 'on'){
            $product->status = 1;
        }
        if($request->diameter != null){
            // $diameter = explode(",",$request->diameter);
            $product->diameter = $request->diameter;
        }
        if($request->focal_length != null){
            $product->focal_length = $request->focal_length;
        }
        if($request->power_model != null){
            $product->power_model = $request->power_model;
        }
        if($request->voltage != null){
            $product->voltage = $request->voltage;
        }
        if($request->set != null){
            $product->set_word = $request->set;
        }
        if($request->size != null){
            $product->size = $request->size;
        }
        if($request->working_area != null){
            $product->working_area = $request->working_area;
        }
        if($request->bone_diameters != null){
            $product->bone_diameters = $request->bone_diameters;
        }
        if($request->model != null){
            $product->model = $request->model;
        }
        if($request->output_voltage != null){
            $product->output_voltage = $request->output_voltage;
        }
        if($request->model_number != null){
            $product->model_number = $request->model_number;
        }
        if($request->type != null){
            $product->type = $request->type;
        }
        if($request->caliber != null){
            $product->caliber = $request->caliber;
        }
        if($request->substrate_size != null){
            $product->sub_strate_size = $request->substrate_size;
        }
        if($request->wavelength != null){
            $product->wavelength = $request->wavelength;
        }
        if($request->meterial != null){
            $product->material = $request->meterial;
        }
        if($request->style != null){
            $product->style = $request->style;
        }
        if($request->color != null){
            $product->color = $request->color;
        }
        $product->save();
        return redirect('admin/product');

    }
    public function EditProduct(Request $request){
        $product = Product::find($request->id);
        $categories = ProductCategory::all();
        // dd($category);
        return view('admin.product.edit',compact('product','categories'));
    }
}
