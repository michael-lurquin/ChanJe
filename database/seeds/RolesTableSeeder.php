<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrateur',
                'description' => '',
                'weight' => 3,
            ],
            [
                'name' => 'Informaticien',
                'description' => 'Informaticien de secteur',
                'weight' => 2,
            ],
            [
                'name' => 'Responsable',
                'description' => 'Responsable de la bibliothèque ou de la salle didactique',
                'weight' => 1,
            ],
            [
                'name' => 'Utilisateur',
                'description' => 'Personne au comptoir',
                'weight' => 0,
            ],
        ];

        foreach($roles as $role)
        {
            Role::create($role);
        }
    }
}
