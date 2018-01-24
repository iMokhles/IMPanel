<?php

use Illuminate\Database\Seeder;

class RoleSideMenuSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles_sidemenu_sections')->delete();
        
        \DB::table('roles_sidemenu_sections')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'sidemenu_section_id' => 1,
            ),
        ));
        
        
    }
}