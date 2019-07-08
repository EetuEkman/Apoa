<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Opettaja',
            'description' => 'Opettaja',
            'secret' => 'secret'
        ]);

        DB::table('roles')->insert([
            'name' => 'Opiskelija',
            'description' => 'Opiskelija',
            'secret' => ''
        ]);
    }
}
