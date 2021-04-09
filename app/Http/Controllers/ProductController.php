<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productServicce)
    {
        $this->productService = $productServicce;
    }

    function index(){
        $products = $this->productService->getAll();
        return view('products.list',compact('products'));
    }

    function create(){
        $products = $this->productService->getAll();
        return view('products.add',compact('products'));
    }

    public function store(Request $request){
        $this->productService->store($request);

        return redirect()->route('products.list');
    }

    function delete($id){
        $product = $this->productService->findById($id);
        $this->productService->delete($product);

        return redirect()->route('products.list');
    }

    function edit($id){
        $product = $this->productService->findById($id);
        $categories = Category::all();
        return view('products.edit',compact('product','categories'));
    }

    function update($id,Request $request){
//        dd($request,$id);
        $this->productService->update($id,$request);

        return redirect()->route('products.list');
    }

}
