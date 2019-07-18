<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            GroupSeeder::class,
            UserSeeder::class,
            AssessmentSeeder::class,
            ResponseSeeder::class,
            GroupUserSeeder::class
        ]);
    }
}
