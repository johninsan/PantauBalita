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
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '01',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '02',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '03',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '04',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '05',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '06',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '07',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '08',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '09',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '10',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '11',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '12',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('rw')->insert([ //mengisi datadi database
            'rw' => '13',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    	// factory(App\Model\yajra::class,1000)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
