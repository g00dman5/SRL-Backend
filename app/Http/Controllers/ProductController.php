<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Response;
use Purifier;

class ProductController extends Controller
{
    //lists Products
    public function index()
    {
      $products = Product::all();

      return Response::json($products);
    }
    //Stores Products
    public function store(Request $request)
    {
      $rules = [
        "name" => "required",
        "productID" => "required",
        "categoryID" => "required",
        "price" => "required",
        "description" => "required",
        "availability" => "required",
        "image" => "required",
      ];


      $product= new Product;
      $product->name= $request->input('name');
      $product->productID= $request->input('productID');
      $product->categoryID= $request->input('categoryID');
      $product->price= $request->input('price');
      $product->description= $request->input('description');
      $product->availability= $request->input('availability');

      $image = $request->file('image');
      $imageName = $image->getClientOriginalName();
      $image->move("storage/", $imageName);
      $product->image = $request->root()."/public/storage".$imageName;
      $product->save();

      return Response::json(['success'=> "Welcome!"]);
    }

    public function update($id, Request $request)
    {
      //Finds Products based on id
      $product = Product::find($id);
      $product->name= $request->input('name');
      $product->productID= $request->input('productID');
      $product->categoryID= $request->input('categoryID');
      $product->price= $request->input('price');
      $product->description= $request->input('description');
      $product->availability= $request->input('availability');

      $image = $request->file('image');
      $imageName = $image->getClientOriginalName();
      $image->move("storage/", $imageName);
      $product->image = $request->root()."/public/storage".$imageName;

      $product->save();

      return Response::json(['success'=> "Here you are!"]);
    }
    //shows single user
    public function show($id)
    {
      $product = Product::find($id);

      return Response::json($product);
    }
    //deletes single user
    public function destroy($id)
    {
      $product = Product::find($id);

      $product->delete();

      return Response::json(['success' => 'Product Deleted.']);
    }
}
