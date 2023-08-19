<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_category';
    protected $fillable = ['name', /* other attributes */];

    // Define a mutator for the title attribute
    public function setTitleAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
    public function subcategories(){
        return $this->hasMany(ProductCategory::class, 'parent_id','id');
    }
    public function  parentcategory(){
        return $this->belongsTo('App\Models\ProductCategory','parent_id','id');
    }
}
