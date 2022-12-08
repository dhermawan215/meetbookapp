<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin app',
            'email' => 'support@zekindo.co.id',
            'password' => Hash::make('Zekindo1234!'),
            'roles' => 'admin',
        ]);
    }
}
