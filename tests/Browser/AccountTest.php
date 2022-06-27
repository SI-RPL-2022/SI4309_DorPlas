<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AccountTest extends DuskTestCase
{
    /** @test */
    public function open_account_page()
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

            $browser->visit("/account")
                ->assertSee('Sebagai Pemohon')
                ->assertSee('Sebagai Pendonor')
                ->assertSee('Identitas Pribadi')
                ->assertSee('Kontak')
                ->assertSee('Ubah Password');
        });
    }

    /** @test */
    public function user_can_change_identity()
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

            $browser->visit("/account")
                ->assertSee('Identitas Pribadi')
                ->type('name_donators', 'Muhammad Rezki Ananda')
                ->select('gender_donators', 'O')
                ->select('rhesus_type_donators', 'positive')
                ->press('Simpan');
        });
    }

    /** @test */
    public function user_can_change_contact()
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

            $browser->visit("/account")
                ->assertSee('Kontak')
                ->type('email_donators', 'muhammad.rezki.ananda@gmail.com')
                ->type('address_donators', 'Jl.Kediri Raya Weeh, Jawa Timur')
                ->keys('#contact_donators', '085608845319')
                ->press('Simpan');
        });
    }

    /** @test */
    public function user_can_change_password()
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

            $browser->visit("/account")
                ->assertSee('Ubah Password')
                ->type('old_password_donators', '12345')
                ->type('new_password_donators', '12345')
                ->press('Simpan');
        });
    }
}
