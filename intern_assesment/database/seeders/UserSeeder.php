<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $user = new User();
        $user->name = $faker->name;
        $user->email = 'admin@admin.com';
        $user->phone= $faker->phoneNumber;
        $user->address = $faker->address;
        $user->password = Hash::make('password');
        $user->isAdmin = 1;
        $user->created_at = now();
        $user->updated_at = now();
        $res=$user->save();
    }
}
