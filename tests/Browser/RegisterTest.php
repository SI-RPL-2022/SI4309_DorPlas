<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /** @test */
    public function open_login_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Sudah punya akun ? Masuk');
        });
    }

    /** @test */
    public function user_can_login_and_redirect_to_dashboard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name_donators', 'Browser Testing')
                ->type('email_donators', 'browser-testing@gmail.com')
                ->select('blood_type_donators', 'O')
                ->select('rhesus_type_donators', 'positive')
                ->type('address_donators', 'Bandung')
                ->type('contact_donators', '081234567890')
                ->type('password_donators', '12345')
                ->type('#recheck-password', '12345')
                ->press('Daftar')
                ->assertPathIs('/login');
        });
    }
}
