<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Johnny Bravo',
            'email' => 'johnny.bravo@gmail.com',
            'password' => bcrypt('nonsecret')
            ]);
    }
}
