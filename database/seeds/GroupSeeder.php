<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'aaa19sp',
            'description' => 'Sairaanhoitaja',
            'year' => 2019,
            'semester' => 'Syksy'
        ]);

        DB::table('groups')->insert([
            'name' => 'bbb19sp',
            'description' => 'Kätilö',
            'year' => 2019,
            'semester' => 'Syksy'
        ]);

        DB::table('groups')->insert([
            'name' => 'ccc19sp',
            'description' => 'Konetekniikka',
            'year' => 2019,
            'semester' => 'Syksy'
        ]);

        DB::table('groups')->insert([
            'name' => 'ddd19sp',
            'description' => 'Tietotekniikka',
            'year' => 2019,
            'semester' => 'Syksy'
        ]);

        DB::table('groups')->insert([
            'name' => 'eee19sp',
            'description' => 'Sähkötekniikka',
            'year' => 2019,
            'semester' => 'Syksy'
        ]);
    }
}
