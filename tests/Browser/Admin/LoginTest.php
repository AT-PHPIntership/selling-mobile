<?php

namespace Tests\Browser\Admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
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
            'email' => 'admin@gmail.com',
            'username' => 'dangviet',
            'password' => bcrypt('12345'),
            'phonenumber' => '131123234',
            'address' => 'adfsdfasdf',
            'role' => '0',
            'avatar' => 'adfaf.pdf',
        ]);
    }


    /**
     * A Dusk test login failure.
     *
     * @return void
     */
    public function testFailure()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('email', 'afds!23@gmail.com')
                    ->type('password', '12312')
                    ->press('Login')
                    ->assertPathIs('/admin/login')
                    ->assertSee('These credentials do not match our records.');
        });
    }

    /**
     * A Dusk test login success.
     *
     * @return void
     */
    public function testSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('email', $this->user->email)
                    ->type('password', '12345')
                    ->press('Login')
                    ->assertPathIs('/admin/home')
                    ->assertSee('Welcome To Dashboard');
        });
    }

    /**
     * A Dusk test Logout.
     *
     * @return void
     */
    public function testLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/home')
                    ->click('.dropdown')
                    ->clickLink('Logout')
                    ->assertPathIs('/admin/login');
        });
    }
}
