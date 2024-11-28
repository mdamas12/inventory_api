<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role1 = Role::create(['name'=>'administrator']);
       $role2 = Role::create(['name'=>'customer']);
       $role3 = Role::create(['name'=>'assistant']);


      Permission::create(['name'=>'dash.administrator'])->syncRoles([$role1]);
      Permission::create(['name'=>'dash.customer'])->syncRoles([$role2]);
      Permission::create(['name'=>'dash.assistant'])->syncRoles([$role3]);

      //assignRole('administrator')
    }
}
