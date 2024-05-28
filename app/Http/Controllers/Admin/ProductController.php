<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(test());
        $products = Product::paginate(10);
        return view('backEnd.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd(category::categoryOption());
        $categoryOptions = category::categoryOption();
        return view('backEnd.pages.product.create', compact('categoryOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|mimes:jpg,jpeg,pdf,png,gif,bmp'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;
        $product->category_id = $request->category ;

        // image setup
        $destination = 'files/';
        $file = $request->file('image');
       $fileName = fileUpload($file, $destination);

        $product->image = $fileName;
        $product->save();

        return redirect()->to('/admin/product')->with('done', 'product inserted successfully' );

        // return $request->all();
;    }

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
        $product = Product::find($id);
        $categoryOptions = category::categoryOption();
        return view ('backEnd.pages.product.edit', compact('product','categoryOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|mimes:jpg,jpeg,pdf,png,gif,bmp'
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;
        $product->category_id = $request->category ;

        // image section
        $destination = 'files';
        $fileName = fileUpdate($product->image, $request->file('image'), $destination);

        $product->image = $fileName;
        $product->save();

        return redirect()->to('/admin/product')->with('info', 'updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
       $product = Product::find($id);

        fileDelete($product->image);
        $product->delete();
        
        return redirect()->to('/admin/product')->with('warning', 'deleted successfully' );

    }
}

