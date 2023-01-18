<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = Role::Create([
            'name' => 'admin'
        ]);

        $trainer = Role::create([
            'name' => 'trainer'
        ]);

        Permission::Create([
            'name' => 'list sports'
        ]);
        Permission::Create([
            'name' => 'create sports'
        ]);
        Permission::Create([
            'name' => 'update sports'
        ]);
        Permission::Create([
            'name' => 'delete sports'
        ]);


        Permission::Create([
            'name' => 'list positions'
        ]);
        Permission::Create([
            'name' => 'create positions'
        ]);
        Permission::Create([
            'name' => 'update positions'
        ]);
        Permission::Create([
            'name' => 'delete positions'
        ]);


        Permission::Create([
            'name' => 'list teams'
        ]);
        Permission::Create([
            'name' => 'create teams'
        ]);
        Permission::Create([
            'name' => 'update teams'
        ]);
        Permission::Create([
            'name' => 'delete teams'
        ]);


        Permission::Create([
            'name' => 'list trainers'
        ]);
        Permission::Create([
            'name' => 'create trainers'
        ]);
        Permission::Create([
            'name' => 'update trainers'
        ]);
        Permission::Create([
            'name' => 'delete trainers'
        ]);


        Permission::Create([
            'name' => 'list players'
        ]);
        Permission::Create([
            'name' => 'create players'
        ]);
        Permission::Create([
            'name' => 'update players'
        ]);
        Permission::Create([
            'name' => 'delete players'
        ]);


        $admin->givePermissionTo(permission::all());
        $trainer->givePermissionTo(['list players','list teams']);
    }
}
