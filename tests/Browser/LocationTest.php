<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LocationTest extends DuskTestCase
{
    /** @test */
    public function open_location_page()
    {
        $user = collect([
            'email_donators' => 'muhammad.rezki.ananda@gmail.com',
            'password_donators' => '12345'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->assertSee('Masuk')
                ->type('email_donators', $user['email_donators'])
                ->type('password_donators', $user['password_donators'])
                ->press('Masuk');

            $browser->visit("/location")
                ->assertSee('PMI');
        });
    }

    /** @test */
    public function redirect_donor_page()
    {
        $user = collect([
            'email_donators' => 'muhammad.rezki.ananda@gmail.com',
            'password_donators' => '12345'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->assertSee('Masuk')
                ->type('email_donators', $user['email_donators'])
                ->type('password_donators', $user['password_donators'])
                ->press('Masuk');

            $browser->visit("/location")
                ->ClickLink('PMI Surabaya')
                ->assertSee('PMI Surabaya')
                ->press('Donor Disini')
                ->assertPathIs('/donor')
                ->assertSee('Form Pengajuan Donor');
        });
    }
}
