<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'password' => bcrypt('secret'),
            'api_token' => Str::random(60)
        ]);

        DB::table('users')->insert([
            'email' => 'ossi.opiskelija@edu.savonia.fi',
            'role_id' => 2,
            'first_name' => 'Ossi',
            'last_name' => 'Opiskelija',
            'password' => bcrypt('secret'),
            'api_token' => Str::random(60)
        ]);

        DB::table('users')->insert([
            'email' => 'onni.opettaja@savonia.fi',
            'role_id' => 1,
            'first_name' => 'Onni',
            'last_name' => 'Opettaja',
            'password' => bcrypt('secret'),
            'api_token' => Str::random(60)
        ]);

        DB::table('users')->insert([
            'email' => 'oiva.opiskelija@edu.savonia.fi',
            'role_id' => 2,
            'first_name' => 'Oiva',
            'last_name' => 'Opiskelija',
            'password' => bcrypt('secret'),
            'api_token' => Str::random(60)
        ]);

        DB::table('users')->insert([
            'email' => 'oodi.opettaja@savonia.fi',
            'role_id' => 1,
            'first_name' => 'Oodi',
            'last_name' => 'Opettaja',
            'password' => bcrypt('secret'),
            'api_token' => Str::random(60)
        ]);

        DB::table('users')->insert([
            'email' => 'olavi.opiskelija@edu.savonia.fi',
            'role_id' => 2,
            'first_name' => 'Olavi',
            'last_name' => 'Opiskelija',
            'password' => bcrypt('secret'),
            'api_token' => Str::random(60)
        ]);

        DB::table('users')->insert([
            'email' => 'teppo.testaaja@edu.savonia.fi',
            'role_id' => 2,
            'first_name' => 'Teppo',
            'last_name' => 'Testaaja',
            'password' => bcrypt('secret'),
            'api_token' => Str::random(60)
        ]);

        DB::table('users')->insert([
            'email' => 'ongelma.opettaja@savonia.fi',
            'role_id' => 1,
            'first_name' => 'Ongelma',
            'last_name' => 'Opettaja',
            'password' => bcrypt('secret'),
            'api_token' => Str::random(60)
        ]);
    }
}
