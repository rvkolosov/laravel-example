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
    }
}