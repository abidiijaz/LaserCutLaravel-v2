<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopulerCategory extends Model
{
    use HasFactory;
    protected $table = 'populercategory';
    public function getCategory(){
        return $this->belongsTo('App\Models\ProductCategory','category_id', 'id');
    }
}
