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
        // Comment this call method and uncomment
        // the latter to run seeders aimed at development

        $this->call([
            ProductionSeeder::class
        ]);

        // Uncomment this call method and comment
        // the former to run seeder aimed at the production
        /*
        $this->call([
            RoleSeeder::class,
            GroupSeeder::class,
            UserSeeder::class,
            AssessmentSeeder::class,
            ResponseSeeder::class,
            GroupUserSeeder::class
        ]);
        */
    }
}
