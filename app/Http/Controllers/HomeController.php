<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $products = Product::paginate(50);

        $categories = Category::where('category_id',NULL)->get();    //This line is trying to get all categories from the Category table where the category_id is 'null'.
                                                                       //It gets all the top-level categories (those that don’t have a parent category) from the database.
        return view("home",compact("products","categories"));
    }

    public function search(Request $req){
$search = $req->search;
$products = Product::whereLike('title','%$search%')->paginate(50);
$categories = Category::where('category_id',NULL)->get();
return view('home',compact('products','categories'));
    }

    public function filter($catId){
$products = Product::where('category_id','$catId')->paginate(50);
$categories = Category::where('category_id',NULL)->get();
return view('home',compact('products','categories'));
    }

    
}
