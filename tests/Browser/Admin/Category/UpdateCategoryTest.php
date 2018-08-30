<?php

namespace Tests\Browser\Admin\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\AdminTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Category\UpdateCategory;

class UpdateCategoryTest extends AdminTestCase
{
    use DatabaseMigrations;

    /**
     * Override function setUp() for make update category
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category')->create([
            'name' => 'Name Parent Category'
        ]);
        factory('App\Models\Category')->create([
            'name' => 'Name Children Category',
            'parent_id' => 1,
        ]);
    }

    /**
     * A Dusk test edit parent category success
     *
     * @return void
     */
    public function testUpdateParentCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit(new UpdateCategory)
                    ->type('name', 'Name Parent Category Update')
                    ->press('Submit')
                    ->assertPathIs('/admin/categories')
                    ->assertSee('Update Category Successfull!');
            $this->assertDatabaseHas('categories', ['id' => '1', 'name' => 'Name Parent Category Update', 'parent_id' => null]);
        });
    }
    
    /**
     * A Dusk test edit child category success
     *
     * @return void
     */
    public function testUpdateChildrenCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/categories')
                    ->click('#edit2');
            $browser->assertPathIs('/admin/categories/2/edit')
                    ->type('name', 'Name Children Category Update')
                    ->press('Submit')
                    ->assertPathIs('/admin/categories')
                    ->assertSee('Update Category Successfull!');
            $this->assertDatabaseHas('categories', ['id' => '2', 'name' => 'Name Children Category Update', 'parent_id' => '1']);
        });
    }
}
