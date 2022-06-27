<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employees::factory(5)->create();

        Employees::create([
            'id_employees' => Uuid::uuid4()->toString() . "\n",
            'id_institutions' => '731ef6df-6171-33fd-bd05-93cd76db2cdd',
            'name_employees' => '(Admin) Muhammad Rezki Ananda',
            'email_employees' => 'muhammad.rezki.ananda@pmi.co.id',
            'password_employees' => Hash::make(12345),
            'contact_employees' => '085608845319',
            'address_employees' => 'Jl.Kediri Raya Weeh, Jawa Timur'
        ]);

    }
}
