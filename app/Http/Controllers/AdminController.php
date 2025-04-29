<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $countUser= User::count();                        //for counting users in dashboard
    return view("admin.dashboard",compact('countUser'));
    }

public function manageCategory(){
    $categories = Category::orderby('id','DESC')->paginate(20);
    return view("admin.manageCategory",compact("categories"));
}

public function createCategory(Request $request){
$request->validate([
    'cat_title' => 'required|string|max:255',
]);
Category::create([
    'cat_title' => $request->cat_title,
    'cat_description' => $request->cat_description,
    'category_id'=> $request->category_id,
]);
return redirect()->route('admin.manageCategory')->with('success','Category created successfully');
}
}
