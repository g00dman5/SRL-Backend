<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;
use Response;
use Illuminate\Support\Facades\Validator;
use Purifier;
use JWTAuth;


class OrderController extends Controller
{
  //php constructor
  public function __construct()
  {                                         //the functions that i want authenticated
    $this->middleware('jwt.auth', ['only'=>['store','update']]);
  }

  public function index()
  {
    $orders = Order::all();

    return Response::json($orders);
  }

  public function store(Request $request)
  {
    $rules = [
      'orderID' => 'required',
      'userID' => 'required',
      'productID' => 'required',
      'quantity' => 'required',
      'totalPrice' => 'required',
      'comments' => '',
    ];

    $validator = Validator::make($Purifier::clean($request->all()), $rules);

    if($validator->fails())
    {
      return Response::json(["error" => "All fields must be completed."]);
    }

    $order= new Order;
    $order->orderID= $request->input('orderID');
    $order->userID=Auth::userID()->id;
    $order->productID= $request->input('productID');
    $order->quantity= $request->input('quantity');
    $order->totalPrice= $request->input('totalPrice');
    $order->comments= $request->input('comments');
    $order->save();

    return Response::json(['success'=> "So far so good."]);
  }

  public function update($id, Request $request)
  {
    $validator =
    Validator::make($Purifier::clean($request->all()), $rules);

    if($validator->fails())
    {
      return Response::json(["error" => "All fields required."]);
    }
    //Finds user based on id
    $order = Order::find($id);
    $order->orderID= $request->input('orderID');
    $order->userID= $request->input('userID');
    $order->productID= $request->input('productID');
    $order->quantity= $request->input('quantity');
    $order->totalPrice= $request->input('totalPrice');
    $order->comments= $request->input('comments');
    $order->save();

    return Response::json(['success'=> "Order placed!"]);
  }

  public function show($id)
  {
    $order = Order::find($id);

    return Response::json($order);
  }

  public function destroy ($id)
  {
    $order = Order::find($id);

    $order->delete();

    return Response::json(['success' => 'Order Deleted.']);
  }
}
