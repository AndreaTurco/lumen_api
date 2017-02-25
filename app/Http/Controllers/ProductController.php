<?php

namespace app\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProductController extends BaseController{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursesCollection = Product::all();
        return response()->json($coursesCollection);
    }
    
    public function add(Request $request)
    {

        $product = Product::create([
            'name'        => $request['name'],
            'description' => $request['description'],
            'price'       => $request['price'],
        ]);

        return response()->json($product);
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json(Product::all());
    }
    
    public function delete($id)
    {
        Product::destroy($id);
        return response()->json(Product::all());
    }
}