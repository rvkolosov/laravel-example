<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [
            'user',
            'image',
            'post',
            'room',
            'todo',
            'role',
            'permission',
        ];

        foreach ($models as $model) {
            Permission::create(['name' => "list {$model}s"]);
            Permission::create(['name' => "show {$model}s"]);
            Permission::create(['name' => "create {$model}s"]);
            Permission::create(['name' => "update {$model}s"]);
            Permission::create(['name' => "delete {$model}s"]);
        }

        $role = Role::findByName('admin');

        foreach ($models as $model) {
            $role->givePermissionTo("list {$model}s");
            $role->givePermissionTo("show {$model}s");
            $role->givePermissionTo("create {$model}s");
            $role->givePermissionTo("update {$model}s");
            $role->givePermissionTo("delete {$model}s");
        }

        $role = Role::findByName('user');

        $models = [
            'image',
            'post',
            'room',
            'todo',
        ];

        $role->givePermissionTo('update users');

        foreach ($models as $model) {
            $role->givePermissionTo("list {$model}s");
            $role->givePermissionTo("show {$model}s");
            $role->givePermissionTo("create {$model}s");
            $role->givePermissionTo("update {$model}s");
            $role->givePermissionTo("delete {$model}s");
        }
    }
}
