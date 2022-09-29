<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $admin = new Admin();
        $admin->name = $faker->name;
        $admin->email = 'admin@admin.com';
        $admin->phone= $faker->phoneNumber;
        $admin->address = $faker->address;
        $admin->password = Hash::make('password');
        $admin->created_at = now();
        $admin->updated_at = now();
        $res=$admin->save();
    }
}
