<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Order;
use Response;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();

    return Response::json($categories);
  }

  public function store(Request $request)
  {
    $rules = [
      'name'=>'required',
    ];

    $validator = Validator::make($Purifier::clean($request->all()), $rules);

    if($validator->fails())
    {
      return Response::json(["error" => "All fields must be completed."]);
    }

  }

  public function update($id, Request $request)
  {
    $category = Category::find($request->input(categoryID));
    $category->name = $request->input('name');
    $category->save();
  }

  public function show($id)
  {
    $category = Category::find($id);

    return Response::json($category);
  }

  public function destroy ($id)
  {
    $category = Category::find($id);

    $category->delete();

    return Response::json(['success' => 'Category Deleted.']);
  }
}
