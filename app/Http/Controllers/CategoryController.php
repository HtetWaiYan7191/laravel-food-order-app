<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //redirect to category list 
    public function list() {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.list', compact('categories'));
    }

    public function createPage() {
        return view('admin.category.create');
    }

    public function create(Request $request) {
       $this->categoryValidation($request);
       $categories = $this->getCategoryData($request);
       Category::create($categories);
       return redirect()->route('category#list')->with(['success' => 'Category created successfully']);
    }

    public function delete($id) {
        Category::where('id', $id)->delete();
        return back();
    }

    //helper functions for checking validation 

    private function categoryValidation($request) {
        Validator::make($request->all(), [
            'categoryName' => 'required|min:4|unique:categories,name'
        ],[
            'categoryName.required' => 'Category Name should be filled',
        ])->validate();
    }

    //helper function for converting data to array 
    private function getCategoryData($request) {
        return [
            'name' => $request->categoryName
        ];
    }
}
