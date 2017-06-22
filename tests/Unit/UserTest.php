<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Artisan;
use App\User;

class UserTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');

        // $this->seed('DatabaseSeeder');
    }

    public function tearDown()
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

    /**
     * Création d'un utilisateur
     *
     * @return void
     */
    public function testCreateUser()
    {
        factory(User::class)->create();

        $users = User::all();

        $this->assertCount(1, $users);
    }

    /**
     * Suppression des utilisateurs
     *
     * @return void
     */
    public function testDestroyAllUsers()
    {
        User::truncate();

        $users = User::all();

        $this->assertCount(0, $users);
    }
}
