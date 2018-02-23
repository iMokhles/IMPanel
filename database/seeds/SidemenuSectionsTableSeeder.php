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
                'sort' => 3,
                'is_active' => 1,
                'created_at' => '2018-01-21 22:52:46',
                'updated_at' => '2018-02-18 21:40:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'FrontEnd',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-01-23 14:59:09',
                'updated_at' => '2018-02-18 21:40:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Users',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 15:16:58',
                'updated_at' => '2018-02-18 21:40:00',
            ),
        ));
        
        
    }
}