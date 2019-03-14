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
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'password' => bcrypt('admin'),
            'position' => 'admin',
        ]);
    }
}
