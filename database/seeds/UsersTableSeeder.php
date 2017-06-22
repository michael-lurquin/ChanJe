<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Michaël',
            'lastname' => 'Lurquin',
            'email' => 'michael.lurquin@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
