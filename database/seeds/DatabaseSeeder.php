<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'name' => 'Gerardo Steven',
            'email'     => 'gerardo@typhoon.com',
            'password' => Hash::make('root'),
            'rol' => 0,
        ]);
        DB::table('users')->insert([
        	'name' => 'Gerardo User',
            'email'     => 'gerardo_user@typhoon.com',
            'password' => Hash::make('root'),
            'rol' => 1,
        ]);
    }
}
