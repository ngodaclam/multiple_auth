<?php

namespace Database\Seeders;

use App\Http\Traits\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    use CommonTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin user
        $admin = User::create([
            'name' => 'administrator',
            'email' => 'mkt0dong@beetsoft.com.vn',
            'password' => Hash::make('HVw!K!jz6y'),
            'type' => User::ADMIN
        ]);

        $adminRole = Role::findByName(User::ROLE_ADMIN);
        $admin->syncRoles($adminRole);

         // create partner user
        $partner = User::create([
            'name' => 'Ngo Lam',
            'email' => 'lamnd@beetsoft.com.vn',
            'password' => Hash::make('12345678'),
            'mobile' => '0974844203',
            'birthday' => Carbon::parse('08/12/1990'),
            'cmtnd' => '036090013668',
            'referral_code' => 'X1fYK3',
            'promo_code' => 'X1fYK3PROMO',
            'parent_ids' => null,
            'type' => User::PARTNER
        ]);

        $partnerRole = Role::findByName(User::ROLE_PARTNER);
        $partner->syncRoles($partnerRole);


         // create more partner
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);

        foreach (range(1, 5000) as $index) {
            $user = User::create([
                'name' => $faker->name($gender),
                'email' => $faker->email,
                'password' => Hash::make(150115),
                'mobile' => $faker->numerify('0#########'),
                'cmtnd' => $faker->numerify('############'),
                'referral_code' => $this->generateRandomString(6),
                'type' => User::PARTNER,
                'status' => false,
                'birthday' => Carbon::parse('09/23/1999'),
            ]);

            $userRole = Role::findByName(User::ROLE_PARTNER);
            $user->syncRoles($userRole);
        }
    }
}
