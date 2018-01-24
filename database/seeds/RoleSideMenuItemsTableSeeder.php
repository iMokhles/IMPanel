<?php

use Illuminate\Database\Seeder;

class RoleSideMenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles_sidemenu_items')->delete();
        
        \DB::table('roles_sidemenu_items')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'sidemenu_item_id' => 1,
            ),
        ));
        
        
    }
}