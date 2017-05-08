<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use Illuminate\Support\Facades\Validator;
use Purifier;
use Hash;

class UserController extends Controller
{
  //lists Users
  public function index()
  {
    $users = User::all();

    return Response::json($users);
  }
  //Stores users
  public function store(Request $request)
  {
    $rules = [
      "name" => "required",
      "email" => "required",
      "password" => "required",
      "userID" => "required",
      "roleID" => "required",
      "address" => "required",
      "phone" => "required",
    ];

    $validator =
    Validator::make($Purifier::clean($request->all()), $rules);

    if($validator->fails())
    {
      return Response::json(["error" => "All fields required."]);
    }

    $user= new User;
    $user->name= $request->input('name');
    $user->email= $request->input('email');
    $user->password= Hash::make($request->input("password"));
    $user->userID= $request->input('userID');
    $user->roleId= $request->input('roleID');
    $user->address= $request->input('address');
    $user->phone= $request->input('phone');

    $user->save();

    return Response::json(['success'=> "Welcome aboard!"]);
  }

  public function update($id, Request $request)
  {
    //Finds user based on id
    $user = User::find($id);
    $user->name= $request->input('name');
    $user->email= $request->input('email');
    $user->password= $request->input('password');
    $user->address= $request->input('address');
    $user->phone= $request->input('phone');
    $user->roleID= $request->input('roleID');
    $user->userID= $request->input('userID');

    $user->save();

    return Response::json(['success'=> "Greetings"]);
  }
  //shows single user
  public function show($id)
  {
    $user = User::find($id);

    return Response::json($user);
  }
  //deletes single user
  public function destroy($id)
  {
    $user = User::find($id);

    $article->delete();

    return Response::json(['success' => 'User Deleted.']);
  }
}
