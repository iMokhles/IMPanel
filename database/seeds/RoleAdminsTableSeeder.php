<?php

use Illuminate\Database\Seeder;

class RoleAdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_admins')->delete();
        
        \DB::table('role_admins')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'admin_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 2,
                'admin_id' => 2,
            ),
        ));
        
        
    }
}