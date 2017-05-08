<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Role;

class RoleController extends Controller
{
  public function index(Request $request)
  {
    $roles= Role::all();

    return Response::json($roles)
  }

  public function store(Request $request)
  {
    $rules = [
      'roleID'=>'required',
      'name'=>'required',
    ];
  }

  public function update($id, Request $requst)
  {
    $role = Role::find($id)
    $role->roleID = $request->input('roleID');
    $role->name = $request->input('name');
    $role->save();
  }

  public function show($id)
  {
    $role = Role::find($id)

    return Response::json($role)
  }

  public function destroy($id)
  {
    $role = Role::find($id);

    $role->delete();

    return Response::json(['success'=> "Role Deleted."]);
  }
}
