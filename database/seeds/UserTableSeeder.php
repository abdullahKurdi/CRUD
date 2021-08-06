<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'Mohammed',
            'email' => 'kurdi313@gmail.com',
            'password' => 123456789
        ));
        User::create(array(
            'name' => 'abdullah',
            'email' => 'kurdi303@gmail.com',
            'password' => 123456789
        ));

        User::create(array(
            'name' => 'sara',
            'email' => 'kurdi393@gmail.com',
            'password' => 123456789
        ));

        User::create(array(
            'name' => 'ali',
            'email' => 'kurdi383@gmail.com',
            'password' => 123456789
        ));

        User::create(array(
            'name' => 'hanan',
            'email' => 'kurdi373@gmail.com',
            'password' => 123456789
        ));

        User::create(array(
            'name' => 'leen',
            'email' => 'kurdi353@gmail.com',
            'password' => 123456789
        ));

        User::create(array(
            'name' => 'khalid',
            'email' => 'kurdi363@gmail.com',
            'password' => 123456789
        ));
    }
}
