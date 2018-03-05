<?php

use Illuminate\Database\Seeder;

class RolesStatisticsSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles_statistics_sections')->delete();
        
        \DB::table('roles_statistics_sections')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'statistics_section_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 1,
                'statistics_section_id' => 2,
            ),
        ));
        
        
    }
}