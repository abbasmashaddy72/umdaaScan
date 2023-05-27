<?php

namespace Database\Seeders;

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
        $inputs = [
            ['Role List'],
            ['Role Add'],
            ['Role Edit'],
            ['Role Delete'],
            ['User List'],
            ['User Add'],
            ['User Edit'],
            ['User Delete'],
            ['Doctor List'],
            ['Doctor Add'],
            ['Doctor Edit'],
            ['Doctor Delete'],
            ['Patient List'],
            ['Patient Add'],
            ['Patient Edit'],
            ['Patient Delete'],
            ['Appointment List'],
            ['Appointment Add'],
            ['Appointment Edit'],
            ['Appointment Delete'],
        ];

        foreach ($inputs as $data) {
            Permission::insert([
                'name' => $data[0],
                'slug' => strtolower(str_replace(' ', '_', $data[0])),
            ]);
        }
    }
}
