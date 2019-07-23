<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
 
class RoleAPIController extends Controller
{
    public function index()
    {
        return new RoleCollection(Role::paginate());
    }
 
    public function show(Role $role)
    {
        return new RoleResource($role->load(['users']));
    }

    public function store(Request $request)
    {
        return new RoleResource(Role::create($request->all()));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        return new RoleResource($role);
    }

    public function destroy(Request $request, Role $role)
    {
        $role->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
