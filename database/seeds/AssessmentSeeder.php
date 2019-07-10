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
            'title' => Str::random(10),
            'body' => "Oletko ".Str::random(32)."?"
        ]);

        DB::table('assessments')->insert([
            'user_id' => 1,
            'title' => Str::random(14),
            'body' => "Miten ".Str::random(28)."?"
        ]);

        DB::table('assessments')->insert([
            'user_id' => 1,
            'title' => Str::random(10),
            'body' => "Kuinka ".Str::random(36)."?"
        ]);

        DB::table('assessments')->insert([
            'user_id' => 3,
            'title' => Str::random(10),
            'body' => "Tarvitsetko ".Str::random(25)."?"
        ]);

        DB::table('assessments')->insert([
            'user_id' => 3,
            'title' => Str::random(12),
            'body' => "Koetko ".Str::random(30)."?"
        ]);
    }
}
