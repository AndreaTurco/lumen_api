<?php

namespace app\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Events\ProductAddedEvent;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProductController extends BaseController{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursesCollection = Product::paginate(15);
        return response()->json($coursesCollection);
    }

    private function validateProductRequestData(Request $request){
        $this->validate($request, [
            'name'        => 'required',
            'description' => 'max:1500',
            'price'       => 'numeric'
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function add(Request $request)
    {
        $this->validateProductRequestData($request);
        $product = Product::create([
            'name'        => $request['name'],
            'description' => $request['description'],
            'price'       => $request['price'],
        ]);
        event(new ProductAddedEvent($product));
        return response()->json($product);
    }

    /**
     * We assume to have an id in the request
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateProductRequestData($request);
        Product::firstOrCreate($request->all());
        return $this->index();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Product::destroy($id);
        return $this->index();
    }
}