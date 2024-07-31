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
        Role::create(['name' => 'SUPER ADMINISTRADOR']);
        $admin = Role::create(['name' => 'ADMINISTRADOR']);
        $asistente = Role::create(['name' => 'ASISTENTE']);
        $sociedad = Role::create(['name' => 'SOCIEDAD']);
        $docente = Role::create(['name' => 'DOCENTE']);
        $estudiante = Role::create(['name' => 'ESTUDIANTE']);
        $escuela = Role::create(['name' => 'ESCUELA']);
        $vri = Role::create(['name' => 'VRI']);


        Permission::create(['name' => 'necesidades.ver'])->syncRoles($admin, $asistente, $escuela, $vri);
        Permission::create(['name' => 'necesidades.crear'])->syncRoles($sociedad, $admin, $asistente, $escuela, $vri);
        Permission::create(['name' => 'necesidades.editar'])->syncRoles($sociedad, $admin, $asistente, $escuela, $vri);
        Permission::create(['name' => 'necesidades.eliminar'])->syncRoles($sociedad, $admin, $asistente);
        Permission::create(['name' => 'necesidades.curar'])->syncRoles($admin, $asistente, $escuela, $vri);

        Permission::create(['name' => 'propuestas.ver'])->syncRoles($admin, $asistente, $escuela, $vri, $estudiante, $docente);
        Permission::create(['name' => 'propuestas.editar'])->syncRoles($admin, $asistente, $escuela, $vri);
        Permission::create(['name' => 'propuestas.eliminar'])->syncRoles($admin, $asistente, $escuela, $vri);
        Permission::create(['name' => 'propuestas.postular'])->syncRoles($estudiante, $docente);

        Permission::create(['name' => 'notificaciones.crear'])->syncRoles($admin, $asistente, $escuela, $vri);
        Permission::create(['name' => 'notificaciones.ver'])->syncRoles($admin, $asistente, $escuela, $vri, $sociedad);

        Permission::create(['name' => 'postulaciones.ver'])->syncRoles($admin, $asistente, $escuela);
        Permission::create(['name' => 'postulaciones.eliminar'])->syncRoles($admin, $asistente, $escuela);
        Permission::create(['name' => 'postulaciones.asignar'])->syncRoles($admin, $asistente, $escuela);

        Permission::create(['name' => 'mis-necesidades.ver'])->syncRoles($sociedad);
        Permission::create(['name' => 'mis-postulaciones.ver'])->syncRoles($docente, $estudiante);

        Permission::create(['name' => 'proyectistas.ver'])->syncRoles($admin, $asistente, $vri);
        Permission::create(['name' => 'proyectistas.crear'])->syncRoles($admin, $asistente, $vri);
        Permission::create(['name' => 'proyectistas.editar'])->syncRoles($admin, $asistente, $vri);
        Permission::create(['name' => 'proyectistas.eliminar'])->syncRoles($admin, $asistente, $vri);

        Permission::create(['name' => 'equipos.ver'])->syncRoles($admin, $asistente, $escuela);
        Permission::create(['name' => 'equipos.crear'])->syncRoles($admin, $asistente, $escuela);
        Permission::create(['name' => 'equipos.editar'])->syncRoles($admin, $asistente, $escuela);
        Permission::create(['name' => 'equipos.eliminar'])->syncRoles($admin, $asistente, $escuela);
    }
}
