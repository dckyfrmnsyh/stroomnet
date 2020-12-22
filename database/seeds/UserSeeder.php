<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@sburegjatim.co.id',
            'password' => bcrypt('icon2020'),
        ]);
        $admin->assignRole('admin');

        $sales = User::create([
            'name' => 'Sales',
            'email' => 'sales@sburegjatim.co.id',
            'password' => bcrypt('123456789'),
        ]);
        $sales->assignRole('sales');

        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@sburegjatim.co.id',
            'password' => bcrypt('123456789'),
        ]);
        $customer->assignRole('customer');
    }
}