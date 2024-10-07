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

        // Crear permisos y sincronizarlos con roles
        // Permission::create(['name' => 'categorias.index'])->syncRoles([$roleAdmin, $roleUser]);
        // Permission::create(['name' => 'categorias.create'])->syncRoles([$roleAdmin]);
        // Permission::create(['name' => 'categorias.edit'])->syncRoles([$roleAdmin]);
        // Permission::create(['name' => 'categorias.show'])->syncRoles([$roleAdmin]);

        // Crear permisos y sincronizarlos con roles
        Permission::create(['name' => 'categorias.index'])->syncRoles([$roleAdmin, $roleUser]);
        Permission::create(['name' => 'categorias.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categorias.update'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categorias.destroy'])->syncRoles([$roleAdmin]);

        // $roleAdmin=Role::create(['name'=>'admin']);
        // $roleUser=Role::create(['name'=>'user']);

                    // Permission::create(['name'=>'categoria.index']->syncRoles([$roleAdmin,$roleUser]));
                    // Permission::create(['name'=>'categoria.create']->syncRoles([$roleAdmin]));
                    // Permission::create(['name'=>'categoria.update']->syncRoles([$roleAdmin]));
                    // Permission::create(['name'=>'categoria.destroy']->syncRoles([$roleAdmin]));

        // Permission::create(['name'=>'categorias.index']->syncRoles([$roleAdmin,$roleUser]));
        // Permission::create(['name'=>'categorias.create']->syncRoles([$roleAdmin]));
        // Permission::create(['name'=>'categorias.edit']->syncRoles([$roleAdmin]));
        // Permission::create(['name'=>'categorias.show']->syncRoles([$roleAdmin]));



        Permission::create(['name' => 'productos.index'])->syncRoles([$roleAdmin, $roleUser]);
        Permission::create(['name' => 'productos.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'productos.update'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'productos.destroy'])->syncRoles([$roleAdmin]);
    }
}
