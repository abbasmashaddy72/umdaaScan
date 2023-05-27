<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            ['1', 'Super Admin'],
            ['2', 'Admin'],
            ['3', 'Doctor'],
            ['4', 'Pharmacy'],
            ['5', 'Reception'],
            ['6', 'Lab'],
        ];

        foreach ($inputs as $data) {
            $role = Role::create([
                'id' => $data[0],
                'name' => $data[1],
                'slug' => strtolower(str_replace(' ', '_', $data[1])),
            ]);

            if ($data[0] == 1) {
                $role->permissions()->attach(Permission::all());
            } else {
                $role->permissions()->syncWithoutDetaching(Permission::inRandomOrder()->limit(10)->get());
            }
        }
    }
}
