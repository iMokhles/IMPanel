<?php

use Illuminate\Database\Seeder;

class RolesSidemenuItemsTableSeeder extends Seeder
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
            1 => 
            array (
                'role_id' => 1,
                'sidemenu_item_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 1,
                'sidemenu_item_id' => 3,
            ),
            3 => 
            array (
                'role_id' => 1,
                'sidemenu_item_id' => 4,
            ),
            4 => 
            array (
                'role_id' => 1,
                'sidemenu_item_id' => 5,
            ),
            5 => 
            array (
                'role_id' => 1,
                'sidemenu_item_id' => 6,
            ),
            6 => 
            array (
                'role_id' => 1,
                'sidemenu_item_id' => 7,
            ),
            7 => 
            array (
                'role_id' => 1,
                'sidemenu_item_id' => 8,
            ),
        ));
        
        
    }
}