<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /** @test */
    public function open_dashboard_page()
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
                ->press('Masuk')
                ->assertPathIs('/dashboard')
                ->assertSee('Trend Covid Indonesia')
                ->assertSee('Artikel Pilihan')
                ->assertSee('Jadwal Donor Terdekat');
        });
    }
}
