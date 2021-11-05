<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Customer::create([
                'name' => $faker->name,
                'birthday' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'identify_code' => $faker->postcode,
                'email' => $faker->email,
                'tel' => $faker->phoneNumber
            ]);
        }
    }
}
