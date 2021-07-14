<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,25) as $key => $value){
            DB::table('employees')->insert([
                "firstName" => Str::random(10),
                "lastName" => Str::random(10),
                "company_id" => 1,
                'email' =>  Str::random(10).'@gmail.com',
                'phone' => mt_rand(1000000000, 9999999999),
            ]);
        }
    }
}
