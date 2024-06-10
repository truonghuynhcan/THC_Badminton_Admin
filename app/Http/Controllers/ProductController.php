<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function procategory(){
        $listCate = Categories::withCount('products')->get();;
        return view('product.category',['listCate' => $listCate]);
    }
}
