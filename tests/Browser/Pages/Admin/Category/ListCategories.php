<?php

namespace Tests\Browser\Pages\Admin\Category;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;
class ListCategories extends Page
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
                ->assertSee(__('category.admin.show.title'))
                ->assertSee(__('category.admin.table.id'))
                ->assertSee(__('category.admin.table.name'))
                ->assertSee(__('category.admin.table.action'))
                ->assertSee(__('category.admin.add.back'));
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
