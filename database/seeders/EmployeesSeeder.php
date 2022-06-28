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

        Employees::create([
            'id_employees' => Uuid::uuid4()->toString() . "\n",
            'id_institutions' => '07f00675-121a-3c22-9f77-97e21324aeeb',
            'name_employees' => '(Admin) Farhan Bani Ahnaf',
            'email_employees' => 'farbanaf@pmi.co.id',
            'password_employees' => Hash::make(12345),
            'contact_employees' => '081210278617',
            'address_employees' => 'Jl. Jombang Raya No.38A, Pondok Kacang Timur, Pondok Aren, Tangerang Selatan'
        ]);
        
        Employees::create([
            'id_employees' => Uuid::uuid4()->toString() . "\n",
            'id_institutions' => '0264db2d-0f84-32ef-b732-d56d7b3d0493',
            'name_employees' => '(Admin) Muhammad Syamaidzar Al Ghifari',
            'email_employees' => 'syamaidzaaar@pmi.co.id',
            'password_employees' => Hash::make(12345),
            'contact_employees' => '081284087732',
            'address_employees' => 'Jl. Malaka Raya, Jakarta Timur'
        ]);

    }
}
