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
     *
     * @return void
     */
    public function run()
    {
        // Crear roles si no existen
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleUser = Role::firstOrCreate(['name' => 'user']);
        $roleRegistrado = Role::firstOrCreate(['name' => 'registrado']);

        // Crear permisos y sincronizarlos con roles
        Permission::firstOrCreate(['name' => 'categorias.index'])->syncRoles([$roleAdmin, $roleUser]);
        Permission::firstOrCreate(['name' => 'categorias.create'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'categorias.update'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'categorias.destroy'])->syncRoles([$roleAdmin]);

        Permission::firstOrCreate(['name' => 'productos.index'])->syncRoles([$roleAdmin, $roleUser]);
        Permission::firstOrCreate(['name' => 'productos.create'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'productos.update'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'productos.destroy'])->syncRoles([$roleAdmin]);

        Permission::firstOrCreate(['name' => 'reportes.inventarios'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'reportes.movimientos'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'reportes.proveedores'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'reportes.financieros'])->syncRoles([$roleAdmin]);

        Permission::firstOrCreate(['name' => 'auditoria.view'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'notificaciones.view'])->syncRoles([$roleAdmin, $roleUser]);
        Permission::firstOrCreate(['name' => 'estadisticas.view'])->syncRoles([$roleAdmin]);

        Permission::firstOrCreate(['name' => 'usuarios.index'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'usuarios.destroy'])->syncRoles([$roleAdmin]);

        Permission::firstOrCreate(['name' => 'notificaciones.view'])->syncRoles([$roleAdmin, $roleUser]);

        Permission::firstOrCreate(['name' => 'control.alarma'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'control.acceso'])->syncRoles([$roleAdmin, $roleUser]);

        Permission::firstOrCreate(['name' => 'movimientos.mes'])->syncRoles([$roleAdmin]);
        Permission::firstOrCreate(['name' => 'usuarios.registrados'])->syncRoles([$roleAdmin]);
    }
}
