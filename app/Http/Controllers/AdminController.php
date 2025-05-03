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

}
