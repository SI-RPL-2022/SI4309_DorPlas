<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseTransactions;

    /** @test */
    public function open_register_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Sudah punya akun ? Masuk');
        });
    }

    /** @test */
    public function user_can_register_and_redirect_to_login()
    {

        $user = collect([
            'name_donators' => 'Browser Testing',
            'email_donators' => 'browser-testing@gmail.com',
            'blood_type_donators' => 'O',
            'rhesus_type_donators' => 'positive',
            'address_donators' => 'Bandung',
            'contact_donators' => '081234567890',
            'password_donators' => '12345'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/register')
                ->assertSee('Daftar')
                ->type('name_donators', $user['name_donators'])
                ->type('email_donators', $user['email_donators'])
                ->select('blood_type_donators', $user['blood_type_donators'])
                ->select('rhesus_type_donators', $user['rhesus_type_donators'])
                ->type('address_donators', $user['address_donators'])
                ->type('contact_donators', $user['contact_donators'])
                ->type('password_donators', $user['password_donators'])
                ->type('#recheck-password', '12345')
                ->press('Daftar')
                ->assertPathIs('/login')
                ->assertSee('Berhasil Melakukan Registrasi');
        });
    }

    /** @test */
    public function user_failed_to_register()
    {
        $user = collect([
            'name_donators' => 'Muhammad Rezki Ananda',
            'email_donators' => 'muhammad.rezki.ananda@gmail.com',
            'password_donators' => Hash::make(12345),
            'gender_donators' => 'male',
            'blood_type_donators' => 'O',
            'rhesus_type_donators' => 'positive',
            'contact_donators' => '085608845319',
            'address_donators' => 'Jl.Kediri Raya Weeh, Jawa Timur',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/register')
                ->assertSee('Daftar')
                ->type('name_donators', $user['name_donators'])
                ->type('email_donators', $user['email_donators'])
                ->select('blood_type_donators', $user['blood_type_donators'])
                ->select('rhesus_type_donators', $user['rhesus_type_donators'])
                ->type('address_donators', $user['address_donators'])
                ->type('contact_donators', $user['contact_donators'])
                ->type('password_donators', $user['password_donators'])
                ->type('#recheck-password', '12345')
                ->press('Daftar')
                ->assertPathIs('/register');
        });
    }
}
