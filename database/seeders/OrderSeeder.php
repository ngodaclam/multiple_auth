<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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
            \App\Models\Order::create([
                'user_id' => $faker->numberBetween(1, 100),
                'partner_id' => $faker->numberBetween(2, 17),
                'item_id' => $faker->numberBetween(1, 100000),
                'amount' => $faker->numberBetween(1, 100000),
                'invoice_no' => $faker->postcode,
                'status' => $faker->numberBetween(0, 2),
                'pti_status' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
