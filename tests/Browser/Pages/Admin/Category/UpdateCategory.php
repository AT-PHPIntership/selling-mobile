<?php

namespace Tests\Browser\Pages\Admin\Category;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;
class UpdateCategory extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/categories';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                ->click('#edit1')  //id
                ->assertPathIs('/admin/categories/1/edit')
                ->assertSee('Edit Category')
                ->assertSee('Name Category')
                ->assertSee('Parent ID')
                ->assertSee('Created At')
                ->assertSee('Updated At')
                ->assertSee('Back')
                ->assertSee('Submit');
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
