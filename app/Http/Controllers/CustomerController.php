<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Response;

class CustomerController extends Controller
{
  public function index()
  {

  }

  public function store(Request $request)
  {

  }

  public function update($id, Request $request)
  {

  }

  public function show($id)
  {

  }

  public function destroy ($id)
  {
    $order = Order::find($id);

    $order->delete();

    return Response::json(['success' => 'Customer Deleted.']);
  }
}
