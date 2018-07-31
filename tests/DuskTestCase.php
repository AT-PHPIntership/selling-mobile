<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use App\Models\User;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;

    /**
     * Override function setUp() for make user login
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->user = factory('App\Models\User')->create([
            'username' => 'truongbe',
            'email' => 'truongbe@gmail.com',
            'password' => bcrypt('12345'), // secret
            'phonenumber' => '7119883772066',
            'address' => 'da nang',
            'role' => User::ADMIN_ROLE,
            'avatar' => 'image.png'
        ]);
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless'
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }
}
