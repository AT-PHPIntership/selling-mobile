<?php

namespace Tests;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\CreatesApplication;
use App\Models\User;

abstract class AdminTestCase extends DuskTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;

    protected $user;

    /**
     * Override function setUp() for make user login
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'password' => bcrypt('12345'),
            'role' => config('setting.role.admin'),
        ]);
    }
}
