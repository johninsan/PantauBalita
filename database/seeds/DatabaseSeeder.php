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
    	factory(App\Model\yajra::class,1000)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
