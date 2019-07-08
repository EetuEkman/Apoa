<?php

use Illuminate\Database\Seeder;

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
            'body' => Str::random(25)
        ]);

        DB::table('responses')->insert([
            'user_id' => 2,
            'assessment_id' => 2,
            'grade' => 4,
            'body' => Str::random(25)
        ]);

        DB::table('responses')->insert([
            'user_id' => 2,
            'assessment_id' => 3,
            'grade' => 2,
            'body' => Str::random(25)
        ]);

        DB::table('responses')->insert([
            'user_id' => 4,
            'assessment_id' => 4,
            'grade' => 3,
            'body' => Str::random(25)
        ]);

        DB::table('responses')->insert([
            'user_id' => 4,
            'assessment_id' => 5,
            'grade' => 3,
            'body' => Str::random(25)
        ]);
    }
}
