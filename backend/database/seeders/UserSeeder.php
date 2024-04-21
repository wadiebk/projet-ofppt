<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'stagiaire',
                'last_name' => 'stagiaire',
                'cin' => 'AA123',
                'classe' => 'DD202',
                'email' => 'test@ofppt.ma',
                'password' => Hash::make('stagiaire'),
            ],
            [
                'first_name' => 'stagiaire2',
                'last_name' => 'stagiaire2',
                'cin' => 'AA1234',
                'classe' => 'DD202',
                'email' => 'test2@ofppt.ma',
                'password' => Hash::make('stagiaire'),
            ],
            [
                'first_name' => 'stagiaire3',
                'last_name' => 'stagiaire3',
                'cin' => 'AA12345',
                'classe' => 'DD201',
                'email' => 'test3@ofppt.ma',
                'password' => Hash::make('stagiaire'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
