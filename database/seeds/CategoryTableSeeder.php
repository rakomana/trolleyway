<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store = new Category();
        $store->category = 'clothing';
        $store->save();

        $store = new Category();
        $store->category = 'electronics';
        $store->save();

        $store = new Category();
        $store->category = 'shoes';
        $store->save();

        $store = new Category();
        $store->category = 'watches';
        $store->save();

        $store = new Category();
        $store->category = 'jewellery';
        $store->save();

        $store = new Category();
        $store->category = 'health and beauty';
        $store->save();

        $store = new Category();
        $store->category = 'kids and babies';
        $store->save();

        $store = new Category();
        $store->category = 'sports';
        $store->save();

        $store = new Category();
        $store->category = 'home and garden';
        $store->save();
    }
}
