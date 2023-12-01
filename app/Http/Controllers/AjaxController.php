<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function pizzaList(Request $request) {
        if($request->status == 'asc') {
            $pizzas = Product::orderBy('created_at', 'asc')->get();
        } else {
            $pizzas = Product::orderBy('created_at', 'desc')->get();
        }
        return response()->json($pizzas, 200);
    }

    public function addToCart(Request $request) {
        $data = $this->getData($request);
        Cart::create($data);
        $response = [
            'message' => 'Item Added to the cart successfully ',
            'status' => 'success'
        ];
        return response()->json($response, 200);
    }

    private function getData($request) {
        return [
            'user_id' => $request->userId,
            'product_id'=> $request->pizzaId,
            'quantity' => $request->count,
        ];
    }
}
