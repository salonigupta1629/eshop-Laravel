<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent(){
        return $this->hasOne(Category::class,'id','category_id');
        //the above line says: This category belongs to one parent category
        //Category::class → It’s linking to the Category model itself (self-relationship)
//id - This is the primary key of the parent category
//category_id - This is the foreign key in the current category
    }

    public function catTitle():Attribute{
        return Attribute::make(
            set: fn($value) =>ucwords($value), //Mutator - When you set or save the value of catTitle, it will also automatically capitalize the first letter of each word.
            get: fn($value) =>ucwords($value), //Accessor - When you get or retrive the value of catTitle, it will automatically capitalize the first letter of each word.
        );
    }

    public function products(){
        return $this->hasMany(Product::class,"category_id","id");
        //the above line says: "One Category can have many Products" 
        //Product::class - we’re connecting to the Product model
        //category_id - the foreign key in the products table (it refers to the category)
        //id - primary key of the category table
    }
}
