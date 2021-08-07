<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();
        $adminRole=Role::create([
            'name'=>'admin',
            'display_name'=>'Administration',
            'description'=>'Administrator',
            'allowed_route'=>'admin'
        ]);

        $supervisorRole=Role::create([
            'name'=>'supervisor',
            'display_name'=>'Supervisor',
            'description'=>'Supervisor',
            'allowed_route'=>'admin'
        ]);

        $customerRole=Role::create([
            'name'=>'customer',
            'display_name'=>'Customer',
            'description'=>'Customer',
            'allowed_route'=>null
        ]);

        $admin=User::create([
            'first_name'=>'Admin',
            'last_name'=>'System',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'mobile'=>'01023860236',
            'email_verified_at'=>now(),
            'user_image'=>'avatar.svg',
            'status'=>1,
            'password'=>bcrypt("123456")
        ]);

        $admin->attachRole($adminRole);

        $supervisor=User::create([
            'first_name'=>'Supervisor',
            'last_name'=>'System',
            'username'=>'supervisor',
            'email'=>'supervisor@gmail.com',
            'mobile'=>'01023860237',
            'email_verified_at'=>now(),
            'status'=>1,
            'user_image'=>'avatar.svg',
            'password'=>bcrypt("123456")
        ]);
        $supervisor->attachRole($supervisorRole);


        $customer=User::create([
            'first_name'=>'Customer',
            'last_name'=>'System',
            'username'=>'customer',
            'email'=>'customer@gmail.com',
            'mobile'=>'01023860238',
            'email_verified_at'=>now(),
            'status'=>1,
            'user_image'=>'avatar.svg',
            'password'=>bcrypt("123456")
        ]);
        $customer->attachRole($customerRole);

        for ($i=0;$i<=20;$i++){

            $randomCustomer=User::create([
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'username'=>$faker->userName(),
                'email'=>$faker->unique()->safeEmail,
                'mobile'=>'96650'.$faker->numberBetween(1000000,9999999),
                'email_verified_at'=>now(),
                'status'=>1,
                'user_image'=>'avatar.svg',
                'password'=>bcrypt("123456")
            ]);
            $randomCustomer->attachRole($customerRole);
        }

    }
}
