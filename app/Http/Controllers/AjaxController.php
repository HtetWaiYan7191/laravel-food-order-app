<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function pizzaList() {
        $pizzas = Product::get();
        return $pizzas;
    }
}
