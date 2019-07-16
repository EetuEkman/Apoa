<?php

use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assessments')->insert([
            'user_id' => 1,
            'title' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=1&format=text'),
            'body' =>  file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
        ]);

        DB::table('assessments')->insert([
            'user_id' => 1,
            'title' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=1&format=text'),
            'body' =>  file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
        ]);

        DB::table('assessments')->insert([
            'user_id' => 1,
            'title' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=1&format=text'),
            'body' =>  file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
        ]);

        DB::table('assessments')->insert([
            'user_id' => 3,
            'title' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=1&format=text'),
            'body' =>  file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
        ]);

        DB::table('assessments')->insert([
            'user_id' => 3,
            'title' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=1&format=text'),
            'body' =>  file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
        ]);
    }
}
