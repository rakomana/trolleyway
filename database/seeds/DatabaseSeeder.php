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
        // $this->call(CouponTableSeeder::class);
        // $this->call(StoreTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(RolesAndPermissionsSeeder::class);
        $this->call(AdminTableSeeder::class);
    }
}
