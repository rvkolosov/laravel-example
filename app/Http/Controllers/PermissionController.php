<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Http\Resources\Permission\PermissionResource;
use App\Http\Resources\Permission\PermissionsResource;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth:api');
        $this->authorizeResource(Permission::class);
    }

    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'index' => 'list',
            'show' => 'view',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $permissions = Permission::filtered()
            ->withRelations()
            ->paginate($request->input('count') ?? 15);

        return PermissionsResource::collection($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePermissionRequest $request
     * @return PermissionResource
     */
    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        return new PermissionResource($permission);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission $permission
     * @return PermissionResource
     */
    public function show(Permission $permission)
    {
        return new PermissionResource($permission->loadRelations());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePermissionRequest $request
     * @param  \App\Models\Permission $permission
     * @return PermissionResource
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return new PermissionResource($permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission $permission
     * @return PermissionResource
     * @throws \Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return new PermissionResource($permission);
    }
}
