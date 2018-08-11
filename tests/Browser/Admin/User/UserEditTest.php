<?php

namespace Tests\Browser\Admin\User;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\AdminTestCase;

class UserEditTest extends AdminTestCase
{
    /**
     * A Dusk test test edit user success.
     *
     * @return void
     */
    public function test_edit_user_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/users')
                    ->visit('/admin/users/1/edit')
                    ->attach('avatar', __DIR__.'/testing/iphone.jpg')
                    ->type('username', 'Dang Viet')
                    ->press('Submit')
                    ->assertPathIs('/admin/users/1/edit')
                    ->assertSee('Edit Success !');
        });
    }

    /**
     * A Dusk test test edit user failure.
     *
     * @return void
     */
    public function test_edit_user_failure()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/users')
                    ->visit('/admin/users/1/edit')
                    ->attach('avatar', __DIR__.'/testing/iphone.jpg')
                    ->type('username', 'Dang')
                    ->type('phonenumber', 'adfasd')
                    ->press('Submit')
                    ->assertPathIs('/admin/users/1/edit')
                    ->assertSee('The username must be at least 5 characters.')
                    ->assertSee('The phonenumber must be a number.');
        });
    }
}
