<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'access_lang_editor',
                'created_at' => '2018-01-21 22:24:23',
                'updated_at' => '2018-01-21 22:24:23',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'full_panel_access',
                'created_at' => '2018-01-21 22:24:29',
                'updated_at' => '2018-01-21 22:24:29',
            ),
        ));
        
        
    }
}