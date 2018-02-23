<?php

use Illuminate\Database\Seeder;

class FrontendNavBarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('navbar_btns')->delete();

        \DB::table('navbar_btns')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'parent_id' => 0,
                    'name' => 'About',
                    'icon' => 'fa-list',
                    'path' => 'about',
                    'sort' => 1,
                    'is_active' => true,
                    'is_rounded' => false,
                    'created_at' => '2018-01-22 10:30:28',
                    'updated_at' => '2018-01-23 17:54:40',
                ),
        ));

    }
}
