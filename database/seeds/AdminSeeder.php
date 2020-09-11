<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'super@gmail.com',
            'password' => Hash::make('123123'),
            'is_admin' => 1,
            'created_at' => Now(),
            'updated_at' => Now()
        ]);
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('123123'),
            'is_admin' => 0,
            'created_at' => Now(),
            'updated_at' => Now()
        ]);
    }
}
