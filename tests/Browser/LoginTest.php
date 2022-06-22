<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /** @test */
    public function open_login_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Belum punya akun ? Daftar');
        });
    }

    /** @test */
    public function user_can_login_and_redirect_to_dashboard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email_donators', 'muhammad.rezki.ananda@gmail.com')
                ->type('password_donators', '12345')
                ->press('Masuk')
                ->assertPathIs('/dashboard');
        });
    }
}
