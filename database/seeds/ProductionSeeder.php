<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductionSeeder extends Seeder
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

        DB::table('users')->insert([
            'email' => 'teppo.testaaja@savonia.fi',
            'role_id' => 1,
            'first_name' => 'Teppo',
            'last_name' => 'Testaaja',
            'password' => bcrypt('vieraitaSambiasta'),
            'api_token' => Str::random(60)
        ]);

        DB::table('groups')->insert([
            'name' => 'abc19sp',
            'description' => 'Esimerkki',
            'year' => 2019,
            'semester' => 'Syksy'
        ]);

        DB::table('group_user')->insert([
            'group_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now()
        ]);
    }
}
