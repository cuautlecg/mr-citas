<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlos Cuautle',
            'email' => 'cuautlecg@gmail.com',
            'password' => bcrypt('Cuautle1611'),
            'cedula' => '78931245',
            'address' => '',
            'phone' => '',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Miguel Cuautle',
            'email' => 'cuautleml@gmail.com',
            'password' => bcrypt('password'),
            'cedula' => '78931245',
            'address' => '',
            'phone' => '',
            'role' => 'doctor'
        ]);

        User::create([
            'name' => 'Tomas Cuautle',
            'email' => 'gcuautle1411@gmail.com',
            'password' => bcrypt('password'),
            'cedula' => '78931245',
            'address' => '',
            'phone' => '',
            'role' => 'patient'
        ]);


        factory(User::class, 50)->states('patient')->create();
    }
}
