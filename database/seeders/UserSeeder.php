<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('app.env') == 'production') {
            $user = User::create([
                'name' => 'Super Admin',
                'email' => 'kyce@mailinator.com',
                'password' => bcrypt('Pa$$w0rd!'),
                'email_verified_at' => now(),
            ]);
            $user->roles()->attach([1]);
        } else {
            $users = User::factory()->count(10)->create();
            foreach ($users as $user) {
                $user->roles()->attach([rand(1, 6)]);
            }
        }
    }
}
