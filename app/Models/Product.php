<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function title():Attribute{
        return Attribute::make(
            // set: fn($value) =>ucwords($value), //Mutator - When you set or save the value of catTitle, it will also automatically capitalize the first letter of each word.
            get: fn($value) =>ucwords($value), //Accessor - When you get or retrive the value of catTitle, it will automatically capitalize the first letter of each word.
        );
    }

    public function discountPrice():Attribute{      //the accessor name should be always in camelCase and not have underscore.
return Attribute::make(
    get: fn($value) => "₹". $value
);
    }

    public function price(): Attribute{
        return Attribute::make(
            get: fn($value) => "₹". $value
        );
    }

    public function image(): Attribute{
        return Attribute::make(
            get: fn($value) => asset('images/'. $value)
        );
    }   
}
