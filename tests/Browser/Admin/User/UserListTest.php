<?php

namespace Tests\Browser\Admin\User;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\AdminTestCase;
use App\Models\User;
use Tests\Browser\Pages\Admin\User\ListUsers;
use Tests\Browser\Pages\Admin\User\InfoUser;

class UserListTest extends AdminTestCase
{
    use DatabaseMigrations;

    const ROW_LIMIT = 10;
    const NUMBER_ROW = 15;

    /**
     * A Dusk test list categories.
     *
     * @return void
     */
    public function testListUser()
    {
        factory(User::class, self::ROW_LIMIT)->create();
        $this->browse(function ($first, $second) {
            $first->loginAs($this->user)
                    ->visit(new ListUsers());

            $second->loginAs($this->user)
                    ->visit(new InfoUser());
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
            $browser->loginAs($this->user)
                    ->visit('/admin/user')
                    ->assertSee('User List');
            $elements = $browser->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertFalse($numRecord == 0);
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
            factory(User::class, self::NUMBER_ROW)->create();
            $elements = $browser->loginAs($this->user)
                                ->visit('/admin/user')
                                ->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 10);
            $elements = $browser->visit('/admin/user?page=2')
                ->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertFalse($numRecord == 5);
        });
    }
}
