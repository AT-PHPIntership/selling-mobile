<?php

namespace Tests\Browser\Pages\Admin\User;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class ListUsers extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param Browser $browser Browser
     *
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                ->assertSee('User List')
                ->assertSee('STT')
                ->assertSee('Avatar')
                ->assertSee('Username')
                ->assertSee('Email')
                ->assertSee('Phone')
                ->assertSee('Role')
                ->assertSee('Action');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
