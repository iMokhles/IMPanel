<?php

use Illuminate\Database\Seeder;

class SidemenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sidemenu_items')->delete();
        
        \DB::table('sidemenu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'section_id' => 1,
                'parent_id' => 0,
                'name' => 'File manager',
                'path' => '/admin/filemanager',
                'icon' => 'fa-files-o',
                'sort' => 3,
                'is_active' => 1,
                'created_at' => '2018-01-22 10:30:28',
                'updated_at' => '2018-01-23 17:54:40',
            ),
            1 => 
            array (
                'id' => 2,
                'section_id' => 2,
                'parent_id' => 0,
                'name' => 'Translate',
                'path' => NULL,
                'icon' => 'fa-globe',
                'sort' => 4,
                'is_active' => 1,
                'created_at' => '2018-01-23 14:59:58',
                'updated_at' => '2018-01-23 17:54:40',
            ),
            2 => 
            array (
                'id' => 3,
                'section_id' => 2,
                'parent_id' => 2,
                'name' => 'Languages',
                'path' => 'admin/language',
                'icon' => 'fa-flag-o',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 15:02:45',
                'updated_at' => '2018-01-23 17:54:40',
            ),
            3 => 
            array (
                'id' => 4,
                'section_id' => 2,
                'parent_id' => 2,
                'name' => 'Language Files',
                'path' => 'admin/language/texts',
                'icon' => 'fa-language',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-01-23 15:03:31',
                'updated_at' => '2018-01-23 17:54:40',
            ),
            4 => 
            array (
                'id' => 5,
                'section_id' => 3,
                'parent_id' => 0,
                'name' => 'Admins',
                'path' => 'admin/admin',
                'icon' => 'fa-user',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 15:17:24',
                'updated_at' => '2018-01-23 17:54:40',
            ),
            5 => 
            array (
                'id' => 6,
                'section_id' => 1,
                'parent_id' => 0,
                'name' => 'MenuManager',
                'path' => NULL,
                'icon' => 'fa-list-alt',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-01-23 17:53:09',
                'updated_at' => '2018-01-23 17:54:40',
            ),
            6 => 
            array (
                'id' => 7,
                'section_id' => 1,
                'parent_id' => 6,
                'name' => 'Sections',
                'path' => 'admin/sidemenusection',
                'icon' => 'fa-th-large',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 17:53:59',
                'updated_at' => '2018-01-23 17:54:40',
            ),
            7 => 
            array (
                'id' => 8,
                'section_id' => 1,
                'parent_id' => 6,
                'name' => 'Items',
                'path' => 'admin/sidemenuitem',
                'icon' => 'fa-th-list',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-01-23 17:54:34',
                'updated_at' => '2018-01-23 17:54:40',
            ),
        ));
        
        
    }
}