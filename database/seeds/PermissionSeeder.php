<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [];

        $permission = Permission::create(['name' => 'todo-list']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'todo-view']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'todo-create']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'todo-update']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'todo-delete']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'todo-restore']);

        array_push($permissions, $permission->id);

        $role = Role::find(1);

        $role->permissions()->attach($permissions);

        $role = Role::find(2);

        $role->permissions()->attach($permissions);

        $role = Role::find(3);

        $role->permissions()->attach($permissions);

        //message permissions
        $permissions = [];

        $permission = Permission::create(['name' => 'message-list']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'message-view']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'message-create']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'message-update']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'message-delete']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'message-restore']);

        array_push($permissions, $permission->id);

        $role = Role::find(1);

        $role->permissions()->attach($permissions);

        $role = Role::find(2);

        $role->permissions()->attach($permissions);

        $role = Role::find(3);

        $role->permissions()->attach($permissions);

        //rooms permissions
        $permissions = [];

        $permission = Permission::create(['name' => 'room-list']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'room-view']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'room-create']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'room-update']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'room-delete']);

        array_push($permissions, $permission->id);

        $permission = Permission::create(['name' => 'room-restore']);

        array_push($permissions, $permission->id);

        $role = Role::find(1);

        $role->permissions()->attach($permissions);

        $role = Role::find(2);

        $role->permissions()->attach($permissions);

        $role = Role::find(3);

        $role->permissions()->attach($permissions);
    }
}
