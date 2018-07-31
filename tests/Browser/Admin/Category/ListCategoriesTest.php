<?php

namespace Tests\Browser\Admin\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Category\ListCategories;

class ListCategoriesTest extends DuskTestCase
{

    use DatabaseMigrations;
    
    const ROW_LIMIT = 10;

    /**
     * A Dusk test list categories.
     *
     * @return void
     */
    public function testListCategories()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ListCategories());
        });
    }

    /**
     * Test data empty.
     *
     * @return void
     */
    public function testDataEmpty()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                    ->assertSee(__('category.admin.list.title'));
            $elements = $browser->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 0);
        });
    }
    /**
     * Test pagination.
     *
     * @return void
     */
    public function testPagination()
    {
        $this->browse(function (Browser $browser) {
            factory('App\Models\Category', 15)->create();
            $elements = $browser->visit('/admin/categories')
                                ->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 10);
            $elements = $browser->visit('/admin/categories?page=2')
                ->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 5);
        });
    }
}
