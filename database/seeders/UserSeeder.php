<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'admin1',
            'role' => 'admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
            ],
            ['name' => 'admin2',
            'role' => 'admin',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            ],
            ['name' => 'owner1',
            'role' => 'owner',
            'email' => 'owner1@gmail.com',
            'password' => Hash::make('password'),
            ],
            ['name' => 'owner2',
            'role' => 'owner',
            'email' => 'owner2@gmail.com',
            'password' => Hash::make('password'),
            ],
            ['name' => 'owner3',
            'role' => 'owner',
            'email' => 'owner3@gmail.com',
            'password' => Hash::make('password'),
            ],
        	['name' => 'user',
            'role' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            ],
        ]);
    }
}
