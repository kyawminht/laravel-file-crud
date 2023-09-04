<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $faker=Factory::create();
//        for ($i=0;$i<21;$i++){
//            DB::table('students')->insert([
//                'name'=>$faker->name,
//                'email'=>$faker->email,
//                'age'=>$faker->numberBetween(18, 30),
//
//            ]);
//        }
        Student::factory()->count(30)->create();
    }
}
