<?php

use Illuminate\Database\Seeder;

class SidemenuSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sidemenu_sections')->delete();
        
        \DB::table('sidemenu_sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrations',
                'sort' => 5,
                'is_active' => 1,
                'created_at' => '2018-01-21 22:52:46',
                'updated_at' => '2018-03-04 11:04:56',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'FrontEnd',
                'sort' => 4,
                'is_active' => 1,
                'created_at' => '2018-01-23 14:59:09',
                'updated_at' => '2018-03-04 11:04:56',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Users',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 15:16:58',
                'updated_at' => '2018-03-04 11:04:56',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Analytics',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-02-19 05:31:09',
                'updated_at' => '2018-03-04 11:04:56',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Statistics',
                'sort' => 3,
                'is_active' => 1,
                'created_at' => '2018-03-04 11:04:04',
                'updated_at' => '2018-03-04 11:04:56',
            ),
        ));
        
        
    }
}