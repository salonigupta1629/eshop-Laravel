<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderby("id","DESC")->paginate(10);
        return view('admin.manageProducts', compact("products"));
    }
    public function insert(){
        $categories = Category::orderby("id","DESC")->get();
        return view("admin.insertProduct",compact("categories"));
    }
    public function store(Request $request){           //this is create Product function
$request->validate([
'title'=>'required|string|max:255',
'price'=>'required|numeric',
'discount_price'=>'numeric',
'image'=>'required|image|mimes:jpeg,png,jpg,gifsvg|max:2048',
'brand'=>'required|string|max:255',
'description'=>'required|string',
'category_id'=>'required|exists:categories,id',
]);

//image
$imageName = time().'.' . $request->image->extension();
$request->image->move(public_path('images'), $imageName);

Product::create([
    'title'=> $request->title,
    'price'=> $request->price,
    'discount_price'=> $request->discount_price,
    'brand'=> $request->brand,
    'description'=> $request->description,
    'category_id'=> $request->category_id,
    'image' => $imageName,
]);

session()->flash('success','Product created successfully');
return redirect()->route('admin.manageProduct');

    }

    
    public function deleteProduct(Product $product){
$product->delete();

session()->flash('delete_success','Product deleted successfully!.');
return redirect()->route('admin.manageProduct')->with("sucess","Product deleted successfully.");
    }
    

    public function editForm(Product $product){
        $categories = Category::orderby("id", "DESC")->get();
return view('components.edit',compact('product','categories'));
    }



    public function updateData(Request $req, $id)
{
    $req->validate([
        'title'=>'required|string|max:255',
        'price'=>'required|numeric',
        'discount_price'=>'nullable|numeric',
        'brand'=>'required|string|max:255',
        'description'=>'required|string',
        'category_id'=>'required|exists:categories,id',
        'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

  

    $product->update($data);

    return redirect()->route('admin.manageProduct')->with('success', 'Product updated successfully.');
}

}
