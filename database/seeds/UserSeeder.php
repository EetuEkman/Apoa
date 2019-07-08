<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'olli.opettaja@savonia.fi',
            'role_id' => 1,
            'first_name' => 'Olli',
            'last_name' => 'Opettaja',
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'email' => 'ossi.opiskelija@edu.savonia.fi',
            'role_id' => 2,
            'first_name' => 'Ossi',
            'last_name' => 'Opiskelija',
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'email' => 'onni.opettaja@savonia.fi',
            'role_id' => 1,
            'first_name' => 'Onni',
            'last_name' => 'Opettaja',
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'email' => 'oiva.opiskelija@edu.savonia.fi',
            'role_id' => 2,
            'first_name' => 'Oiva',
            'last_name' => 'Opiskelija',
            'password' => bcrypt('secret')
        ]);
    }
}