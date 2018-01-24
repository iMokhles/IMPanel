<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'SuperAdmin',
                'created_at' => '2018-01-21 22:23:58',
                'updated_at' => '2018-01-21 22:23:58',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Editor',
                'created_at' => '2018-01-21 22:24:06',
                'updated_at' => '2018-01-21 22:24:06',
            ),
        ));
        
        
    }
}