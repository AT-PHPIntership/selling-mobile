<?php

namespace Tests\Browser\Admin\User;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\AdminTestCase;

class UserCreateTest extends AdminTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test create user success.
     *
     * @return void
     */
    public function test_create_user_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('admin/users/create')
                    ->assertSee('Add User')
                    ->type('username', 'nguyen van a')
                    ->type('email', 'nguyenvana@gmail.com')
                    ->type('phonenumber', '123456789')
                    ->type('address', '12 Tố Hữu - Đà Nẵng')
                    ->attach('avatar', __DIR__.'/testing/iphone.jpg')
                    ->type('password', '123123')
                    ->type('passwordAgain', '123123')
                    ->keys('#role', 1)
                    ->press('Submit')
                    ->assertPathIs('/admin/users')
                    ->assertSee('Add Success!');
        });
    }

    /**
     * A Dusk test create user success.
     *
     * @return void
     */
    public function test_create_user_failure()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('admin/users/create')
                    ->assertSee('Add User')
                    ->type('username', 'Tran Van A')
                    ->type('email', '')
                    ->type('phonenumber', 'adfasdfadf')
                    ->type('address', '12 Tố Hữu - Đà Nẵng')
                    ->attach('avatar', __DIR__.'/testing/iphone.jpg')
                    ->type('password', '123123')
                    ->type('passwordAgain', '12345')
                    ->keys('#role', 1)
                    ->press('Submit')
                    ->assertSee('The email field is required.')
                    ->assertSee('The phonenumber must be a number.')
                    ->assertSee('The password again and password must match.');
        });
    }
}
