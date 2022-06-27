<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DonorTest extends DuskTestCase
{
    /** @test */
    public function open_donor_page()
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

            $browser->visit('/donor')
                ->assertSee('Form Pengajuan Donor');
        });
    }

    /** @test */
    public function user_can_donor()
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

            $browser->visit('/donor')
                ->assertSee('Form Pengajuan Donor')
                ->select('id_institutions', 'PMI Surabaya')
                ->script([
                    "document.querySelector('#schedule_donor_notes').value = '28/06/2022'",
                ]);

            $browser->press('Daftar')
                ->assertPathIs('/donor');
        });
    }

    /** @test */
    public function user_failed_donor()
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

            $browser->visit('/donor')
                ->assertSee('Form Pengajuan Donor')
                ->select('id_institutions', 'PMI Surabaya')
                ->script([
                    "document.querySelector('#schedule_donor_notes').value = '01/06/2022'",
                ]);

            $browser->press('Daftar')
                ->assertPathIs('/donor');
        });
    }
}
