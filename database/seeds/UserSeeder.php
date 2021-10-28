<?php

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
        User::create([
            'name' => 'Paul Valencia',
            'email' => 'admin@evertecinc.com',
            'password' => bcrypt('password')
        ]);
    }
}
