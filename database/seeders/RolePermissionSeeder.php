<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        Permission::create(['name' => 'index.comment'   ])->assignRole('admin');
        Permission::create(['name' => 'index.user'      ])->assignRole('admin');
        Permission::create(['name' => 'edit.post'       ])->assignRole('admin');
        Permission::create(['name' => 'create.post'     ])->assignRole('admin');
        Permission::create(['name' => 'accept.post'     ])->assignRole('admin');
        Permission::create(['name' => 'accept.comment'  ])->assignRole('admin');

        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        $admin->assignRole('admin');
    }
}
