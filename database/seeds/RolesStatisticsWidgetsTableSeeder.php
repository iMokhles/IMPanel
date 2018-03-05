<?php

use Illuminate\Database\Seeder;

class RolesStatisticsWidgetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles_statistics_widgets')->delete();
        
        \DB::table('roles_statistics_widgets')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'statistics_widget_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 1,
                'statistics_widget_id' => 2,
            ),
        ));
        
        
    }
}