<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = Role::create(['name' => 'SUPER ADMINISTRADOR']);
        $admin = Role::create(['name' => 'ADMINISTRADOR']);
        $asistente = Role::create(['name' => 'ASISTENTE']);
        $sociedad = Role::create(['name' => 'SOCIEDAD']);

        Permission::create(['name' => 'necesidades.crear'])->syncRoles($sociedad);
        Permission::create(['name' => 'necesidades.crear'])->syncRoles($admin, $asistente);
    }
}
