<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Image;
use File;
class ProductCategoryController extends Controller
{
    public function index(){
        $categories = ProductCategory::with('parentcategory')->orderBy('id', 'DESC')->get();
        $parent_categories = ProductCategory::with('subcategories')->get();
        $categories = ProductCategory::with('parentcategory')->orderBy('id', 'DESC')->get();
// dd($categories);
        return view('admin.category.index',compact('categories','parent_categories'));
    }
    public function AddCategory(Request $request){
        // dd($request->all());
        $category = new ProductCategory();
        $category->parent_id = $request->parent_category;
        $category->name = $request->name;
        $category->section_id = $request->acceesory;
        $category->keyword = $request->Keyword;
        $category->description = $request->description;
        if($request->status == 'on'){
            $category->status = 1;
        }
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/ab_admin/category/'.$filename));
            $category->image = $filename;
            $category->save();
            return redirect('admin/category');
        }
        $category->save();
        return redirect('admin/category');
    }
    public function EditCategory(Request $request){
        $category = ProductCategory::find($request->id);
        $categories = ProductCategory::all();
        // dd($category);
        return view('admin.category.edit',compact('category','categories'));
    }
    public function updateCategory(Request $request){
        // dd($request->all());
        $category = ProductCategory::find($request->id);
        $category->name = $request->name;
        $category->keyword = $request->Keyword;
        $category->section_id = $request->acceesory;
        $category->description = $request->description;
        if($request->parent_category){
            $category->parent_id = $request->parent_category;
        }else{
            $category->parent_id = 0;
        }

        if($request->status == 'on'){
            $category->status = 1;
        }
        if($request->hasFile('image')){
            $oldImage = public_path("ab_admin/category/{$category->image}"); // get previous image from folder
            if (File::exists($oldImage)) { // unlink or remove previous image from folder
                // unlink($oldImage);
            }
            $avatar = $request->file('image');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/ab_admin/category/'.$filename));
            $category->image = $filename;
            $category->save();
            return redirect('admin/category');
        }
        $category->save();
        return redirect('admin/category');
    }
    public function DeleteCategory(Request $request){
        $category = ProductCategory::where('id',$request->id)->orwhere('parent_id',$request->id)->get();
        foreach($category as $key => $value){
            $value->delete();
        }
        // $category->delete();
        return redirect('admin/category');
    }
}
