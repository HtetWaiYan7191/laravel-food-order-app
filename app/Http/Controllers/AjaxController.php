<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function pizzaList(Request $request) {
        logger($request->all());
        if($request->status == 'asc') {
            $pizzas = Product::orderBy('created_at', 'asc')->get();
        } else {
            $pizzas = Product::orderBy('created_at', 'desc')->get();
        }
        return response()->json($pizzas, 200);
    }
}
