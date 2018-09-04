<?php

namespace Tests\Browser\Admin\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\AdminTestCase;
use Tests\Browser\Pages\Admin\Category\ListCategories;

class DeleteCategoryTest extends AdminTestCase
{
    use DatabaseMigrations;
    
    protected $category;
    
    /**
     * Override function setUp() for make user login
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->category = factory('App\Models\Category')->create([
                'name' => 'iphone',
            ]);
    }
    
    /**
     * Test button delete category in List Categories
     *
     * @return void
     */
    public function testCancelDelele()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new ListCategories)
                ->click('#deleted'.$this->category->id)
                ->assertDialogOpened('Do you want to delete this Category?')
                ->dismissDialog();
            $this->assertDatabaseHas('categories', ['deleted_at' => null]);
        });
    }

    /**
     * Test click button Delete
     *
     * @return void
     */
    public function testConfirmDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit(new ListCategories)
                ->click('#deleted'.$this->category->id)
                ->assertDialogOpened('Do you want to delete this Category?')
                ->acceptDialog()
                ->assertSee('Delete Category Successfull!');
            $this->assertDatabaseHas('categories', ['id' => '1', 'name' => 'iphone', 'parent_id' => null])
                 ->assertDatabaseMissing('categories', ['deleted_at' => null]);
        });
    }
}
