<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\Role\RoleResource;
use App\Http\Resources\Role\RolesResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth:api');
        $this->authorizeResource(Role::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $roles = Role::filtered()
            ->withRelations()
            ->paginate($request->input('count') ?? 15);

        return RolesResource::collection($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return RoleResource
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());

        return new RoleResource($role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return RoleResource
     */
    public function show(Role $role)
    {
        return new RoleResource($role->loadRelations($role));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param  \App\Models\Role $role
     * @return RoleResource
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());

        return new RoleResource($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role $role
     * @return RoleResource
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return new RoleResource($role);
    }
}
