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
    	 // factory(App\Models\Users\s_parent::class, 10)->create();
         // factory(App\Models\Users\student::class, 10)->create();
         // factory(App\Models\Users\school_admin::class, 10)->create();
         factory(App\Models\Users\web_admin::class, 4)->create();

    }
        // $this->call(UsersTableSeeder::class);
}

