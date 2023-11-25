<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // list
    public function list() {
        $pizzas = Product::when(request('key'), function($query, $key) {
            $query->where('name', 'like', '%'. $key .'%');
        })
        ->with('category')
        ->orderBy('created_at', 'desc')
        ->paginate(4);
        return view('admin.product.list', compact('pizzas'));
    }

    public function new() {
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.new', compact('categories'));
    }

    public function create(Request $request) {
        $this->productValidation($request);
        $products = $this->getData($request);
        if($request->hasFile('image')) {
            $fileName = uniqid(). $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $products['image'] = $fileName;
        }

        Product::create($products);
        return redirect()->route('product#list')->with(['success' => 'Product created successfully']);
    }

    public function delete($id) {
        Product::where('id', $id)->delete();
        return back()->with(['success' => 'Product Delete successfully']);

    }

    private function getData($request) {
        return [
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'waiting_time' => $request->waitingTime,
            'updated_at' => Carbon::now(),
        ];
    }

    private function productValidation($request) {
        Validator::make($request->all(), [
            'name' => 'required|min:4|unique:products,name,'.$request->id,
            'category' => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpg,jpeg,web,webp|file',
            'price' => 'required|numeric',
            'waitingTime' => 'required|numeric',
        ],[

        ])->validate();
    }
}
