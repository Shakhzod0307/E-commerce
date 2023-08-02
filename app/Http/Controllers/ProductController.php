<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $products = Product::all();
        return view('admin/products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::pluck('category_name');
        return view('admin/products.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        
        $prod = Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$request->image,
            'category'=>$request->category,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'discount_price'=>$request->discount_price,
        ]);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('/admin/assets/products'), $filename);
            $prod['image']= $filename;
        }
        $prod->image = $prod['image']= $filename;
        $prod->save();
        return redirect()->back()->with('success','Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::pluck('category_name');
        $product = Product::find($id);
        return view('admin/products.edit')->with('product',$product)->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('/admin/assets/products'), $filename);
            $product['image']= $filename;
            $product->image = $product['image']= $filename;
        }
        $product->save();
        return redirect()->back()->with('success','Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->back()->with('success','Product deleted successfully!');
    }
}
