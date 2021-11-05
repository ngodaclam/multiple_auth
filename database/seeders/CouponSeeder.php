<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 11; $i++) {
            \App\Models\Coupon::create([
                'code' => strtoupper(uniqid()),
                'discount' => rand(3,20),
                'validate_from' => now(),
                'validate_to' => now()->addDays(7),
                'use_flg' => \App\Models\Coupon::NOT_USE
            ]);
        }
    }
}
