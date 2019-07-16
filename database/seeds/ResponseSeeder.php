<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responses')->insert([
            'user_id' => 2,
            'assessment_id' => 1,
            'grade' => 3,
            'body' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
            'created_at' => Carbon::now()->subWeeks(2)
        ]);

        DB::table('responses')->insert([
            'user_id' => 2,
            'assessment_id' => 1,
            'grade' => 2,
            'body' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
            'created_at' => Carbon::now()->subWeek()
        ]);

        DB::table('responses')->insert([
            'user_id' => 2,
            'assessment_id' => 1,
            'grade' => 4,
            'body' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
            'created_at' => Carbon::now()
        ]);

        DB::table('responses')->insert([
            'user_id' => 2,
            'assessment_id' => 2,
            'grade' => 4,
            'body' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
            'created_at' => Carbon::now()->subWeeks(2)
        ]);

        DB::table('responses')->insert([
            'user_id' => 2,
            'assessment_id' => 3,
            'grade' => 2,
            'body' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
            'created_at' => Carbon::now()->subWeeks(2)
        ]);

        DB::table('responses')->insert([
            'user_id' => 4,
            'assessment_id' => 4,
            'grade' => 3,
            'body' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
            'created_at' => Carbon::now()->subWeeks(2)
        ]);

        DB::table('responses')->insert([
            'user_id' => 4,
            'assessment_id' => 5,
            'grade' => 3,
            'body' => file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=2&format=text'),
            'created_at' => Carbon::now()->subWeeks(2)
        ]);
    }
}
