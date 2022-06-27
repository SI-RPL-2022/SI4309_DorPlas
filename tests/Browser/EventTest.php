<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EventTest extends DuskTestCase
{
    /** @test */
    public function open_event_page()
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

            $browser->visit("/event")
                ->assertSee('Carilah Event Donor Di Sekitar Anda');
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

            $browser->visit("/event")
                ->ClickLink('Donor Darah bersama PMI Kota Surakarta')
                ->assertSee('Donor Darah bersama PMI Kota Surakarta')
                ->press('Daftar')
                ->assertPathIs('/donor')
                ->assertSee('Form Pengajuan Donor');
        });
    }
}
