<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

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
        foreach(range(1,15) as $key => $value){
            DB::table('companies')->insert([
                "name" => Str::random(10),
                "email" => Str::random(10).'@gmail.com',
                "logo" => "1625886275.png",
                'website' =>  Str::random(10).'.com',
            ]);
        }
    }
}
