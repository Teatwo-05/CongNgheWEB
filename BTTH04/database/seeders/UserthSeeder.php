<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Userth;
use Faker\Factory as Faker;

class UserthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range (1,50) as $index ) {
            Userth::create([
                'username' => $faker->userName,
                'email' => $faker->safeEmail,
                'password' => bcrypt('password'), // Mã hóa mật khẩu
                'role' => $faker->randomElement(['admin', 'user', 'moderator']),
            ]);
        }
    }
}
