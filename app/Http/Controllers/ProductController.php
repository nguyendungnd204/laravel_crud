<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.product_list', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'status' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,png'
        ]);

        if($request->hasFile("image")){
            $validated['image'] = $request->file('image')->store("products", "public");
        }
        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    public function show($id){
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }
}
