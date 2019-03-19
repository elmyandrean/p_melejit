<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    		DB::table('users')->insert([
            'nip' => '123456',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => 'admin phone',
            'password' => bcrypt('123456'),
            'position' => 'admin',
        ]);
    }
}
