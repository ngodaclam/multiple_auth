<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
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
            \App\Models\Company::create([
                'name' => $faker->name,
                'contact_name' => $faker->name,
                'position' => $faker->postcode,
                'from' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'to' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'insurance_quantity' => $faker->postcode,
                'email' => $faker->email,
                'tel' => $faker->phoneNumber
            ]);
        }
    }
}
