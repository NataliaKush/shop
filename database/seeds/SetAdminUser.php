<?php

use Illuminate\Database\Seeder;

class SetAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123456'),
            'username' => 'Admin'
        ]);
    }
}
