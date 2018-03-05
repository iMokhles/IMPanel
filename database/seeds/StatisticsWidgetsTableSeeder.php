<?php

use Illuminate\Database\Seeder;

class StatisticsWidgetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statistics_widgets')->delete();
        
        \DB::table('statistics_widgets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'statistics_section_id' => 1,
                'type' => 'small-box',
                "name" => "Unique Visitors",
                "icon" => "fa-users",
                "sql" => "select count(id) from users",
                'sort' => NULL,
                'is_active' => 1,
                'created_at' => '2018-03-04 16:52:03',
                'updated_at' => '2018-03-04 16:52:03',
            ),
            1 =>
                array (
                    'id' => 2,
                    'statistics_section_id' => 2,
                    'type' => 'table',
                    "name" => "Latest Users",
                    "icon" => "fa-users",
                    "sql" => "select name,email,active,blocked from users",
                    'sort' => NULL,
                    'is_active' => 1,
                    'created_at' => '2018-03-04 16:55:03',
                    'updated_at' => '2018-03-04 16:55:03',
                ),
        ));
        
        
    }
}