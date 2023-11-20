<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //redirect to category list 
    public function list() {
        return view('admin.category.list');
    }
}
