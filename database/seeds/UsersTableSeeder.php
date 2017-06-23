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
        $administrateur = User::create([
            'firstname' => 'Admin',
            'lastname' => '',
            'email' => 'admin@chanje.app',
            'password' => bcrypt('secret'),
        ]);
        $administrateur->assignRole('Administrateur');

        $informaticien = factory(User::class)->create([
            'email' => 'informaticien@chanje.app',
        ]);
        $informaticien->assignRole('Informaticien');

        $responsable = factory(User::class)->create([
            'email' => 'responsable@chanje.app',
        ]);
        $responsable->assignRole('Responsable');

        $utilisateur = factory(User::class)->create([
            'email' => 'utilisateur@chanje.app',
        ]);
        $utilisateur->assignRole('Utilisateur');
    }
}
