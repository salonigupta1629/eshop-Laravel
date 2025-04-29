<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function deleteCategory(Category $category){
        $category->delete();
        
       return redirect()->route('admin.manageCategory')->with('success', 'Category deleted successfully.');
    }

    public function editForm(Category $category){
        $categories = Category::where('id', '!=', $category->id)->get(); 
return view('components.edits', compact('category', 'categories'));

    }

    public function updateData(Request $req, $s){
$data = $req->validate([
'cat_title'=> 'required|string|max:255',
'cat_description'=>'required|string'
]);

$data = Category::find($s)->update($data);

return redirect()->route('admin.manageCategory')->with('success','Category updated successfully.');
    }
}
