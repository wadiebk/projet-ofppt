<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'cin' => 'AA123',
                'email' => 'test@ofppt.ma',
                'password' => Hash::make('admin'),
            ],
            [
                'first_name' => 'admin2',
                'last_name' => 'admin2',
                'cin' => 'AA1234',
                'email' => 'test2@ofppt.ma',
                'password' => Hash::make('admin'),
            ],
            [
                'first_name' => 'admin3',
                'last_name' => 'admin3',
                'cin' => 'AA12345',
                'email' => 'test3@ofppt.ma',
                'password' => Hash::make('admin'),
            ],
        ];

        Admin::insert($admins);
    }
}
