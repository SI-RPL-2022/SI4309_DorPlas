<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SubmissionTest extends DuskTestCase
{
    /** @test */
    public function open_submission_page()
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

            $browser->visit("/submission")
                ->assertSee('Ajukan Donor');
        });
    }

    /** @test */
    public function user_can_request()
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

            $browser->visit("/submission")
                ->type('recipient_donor_submissions', 'Muhammad Rezki Ananda')
                ->select('blood_type_donor_submissions', 'O')
                ->select('rhesus_type_donor_submissions', 'positive')
                ->type('quantity_donor_submissions', 2)
                ->select('id_institutions', '05993934-409e-3c74-9559-150c4cee359b')
                ->attach('ktp_donor_submissions', public_path('images/ktp.jpg'))
                ->attach('letter_donor_submissions', public_path('images/surat_rujukan.jpg'))
                ->press('Daftar')
                ->assertPathIs('/submission');
        });
    }

}
