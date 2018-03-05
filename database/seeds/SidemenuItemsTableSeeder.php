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
                'type' => 'url',
                'path' => '/admin/filemanager',
                'icon' => 'fa-files-o',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-01-22 10:30:28',
                'updated_at' => '2018-02-18 21:01:37',
            ),
            1 => 
            array (
                'id' => 2,
                'section_id' => 1,
                'parent_id' => 0,
                'name' => 'Translate',
                'type' => 'url',
                'path' => 'admin/language',
                'icon' => 'fa-globe',
                'sort' => 3,
                'is_active' => 1,
                'created_at' => '2018-01-23 14:59:58',
                'updated_at' => '2018-03-03 23:04:26',
            ),
            2 => 
            array (
                'id' => 3,
                'section_id' => 2,
                'parent_id' => 2,
                'name' => 'Languages',
                'type' => 'url',
                'path' => 'admin/language',
                'icon' => 'fa-flag-o',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 15:02:45',
                'updated_at' => '2018-02-18 21:01:37',
            ),
            3 => 
            array (
                'id' => 4,
                'section_id' => 2,
                'parent_id' => 2,
                'name' => 'Language Files',
                'type' => 'url',
                'path' => 'admin/language/texts',
                'icon' => 'fa-language',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-01-23 15:03:31',
                'updated_at' => '2018-02-18 21:01:37',
            ),
            4 => 
            array (
                'id' => 5,
                'section_id' => 3,
                'parent_id' => 0,
                'name' => 'Admins',
                'type' => 'url',
                'path' => 'admin/admin',
                'icon' => 'fa-user',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 15:17:24',
                'updated_at' => '2018-02-18 21:45:44',
            ),
            5 => 
            array (
                'id' => 6,
                'section_id' => 1,
                'parent_id' => 0,
                'name' => 'MenuManager',
                'type' => 'url',
                'path' => 'admin/sidemenusection',
                'icon' => 'fa-list-alt',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 17:53:09',
                'updated_at' => '2018-03-03 23:03:32',
            ),
            6 => 
            array (
                'id' => 7,
                'section_id' => 1,
                'parent_id' => 6,
                'name' => 'Sections',
                'type' => 'url',
                'path' => 'admin/sidemenusection',
                'icon' => 'fa-th-large',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 17:53:59',
                'updated_at' => '2018-02-18 21:01:37',
            ),
            7 => 
            array (
                'id' => 8,
                'section_id' => 1,
                'parent_id' => 6,
                'name' => 'Items',
                'type' => 'url',
                'path' => 'admin/sidemenuitem',
                'icon' => 'fa-th-list',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-01-23 17:54:34',
                'updated_at' => '2018-02-18 21:01:37',
            ),
            8 => 
            array (
                'id' => 9,
                'section_id' => 2,
                'parent_id' => 0,
                'name' => 'NavBarBtns',
                'type' => 'url',
                'path' => 'admin/navbarbtn',
                'icon' => 'fa-th-list',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-01-23 17:54:34',
                'updated_at' => '2018-02-18 21:40:19',
            ),
            9 => 
            array (
                'id' => 10,
                'section_id' => 2,
                'parent_id' => 0,
                'name' => 'FooterBtns',
                'type' => 'url',
                'path' => 'admin/footerbtn',
                'icon' => 'fa-th-list',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-02-18 18:03:21',
                'updated_at' => '2018-02-18 21:40:19',
            ),
            10 => 
            array (
                'id' => 11,
                'section_id' => 4,
                'parent_id' => 0,
                'name' => 'Analytics',
                'type' => 'url',
                'path' => 'admin/analytics',
                'icon' => 'fa-pie-chart',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-02-18 23:52:59',
                'updated_at' => '2018-02-19 05:43:09',
            ),
            11 => 
            array (
                'id' => 12,
                'section_id' => 4,
                'parent_id' => 11,
                'name' => 'by Countries',
                'type' => 'url',
                'path' => 'admin/analytics/countries',
                'icon' => 'fa-area-chart',
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-02-19 05:32:10',
                'updated_at' => '2018-02-19 15:39:15',
            ),
            12 => 
            array (
                'id' => 13,
                'section_id' => 4,
                'parent_id' => 11,
                'name' => 'by Cities',
                'type' => 'url',
                'path' => 'admin/analytics/cities',
                'icon' => 'fa-area-chart',
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-02-19 05:32:34',
                'updated_at' => '2018-02-19 15:38:59',
            ),
            13 => 
            array (
                'id' => 14,
                'section_id' => 4,
                'parent_id' => 11,
                'name' => 'by Browsers',
                'type' => 'url',
                'path' => 'admin/analytics/browsers',
                'icon' => 'fa-area-chart',
                'sort' => 3,
                'is_active' => 1,
                'created_at' => '2018-02-19 05:38:36',
                'updated_at' => '2018-02-19 05:43:09',
            ),
            14 => 
            array (
                'id' => 15,
                'section_id' => 4,
                'parent_id' => 11,
                'name' => 'by OSs',
                'type' => 'url',
                'path' => 'admin/analytics/os',
                'icon' => 'fa-area-chart',
                'sort' => 4,
                'is_active' => 1,
                'created_at' => '2018-02-19 05:39:25',
                'updated_at' => '2018-02-19 05:43:09',
            ),
            15 => 
            array (
                'id' => 16,
                'section_id' => 4,
                'parent_id' => 11,
                'name' => 'by Visitors',
                'type' => 'url',
                'path' => 'admin/analytics/visitors',
                'icon' => 'fa-area-chart',
                'sort' => 5,
                'is_active' => 1,
                'created_at' => '2018-02-19 05:40:11',
                'updated_at' => '2018-02-19 05:43:09',
            ),
            16 => 
            array (
                'id' => 17,
                'section_id' => 4,
                'parent_id' => 11,
                'name' => 'by Referrer',
                'type' => 'url',
                'path' => 'admin/analytics/referrer',
                'icon' => 'fa-area-chart',
                'sort' => 6,
                'is_active' => 1,
                'created_at' => '2018-02-19 05:42:12',
                'updated_at' => '2018-02-19 05:43:09',
            ),
            17 => 
            array (
                'id' => 18,
                'section_id' => 4,
                'parent_id' => 11,
                'name' => 'by URLS',
                'type' => 'url',
                'path' => 'admin/analytics/urls',
                'icon' => 'fa-area-chart',
                'sort' => 7,
                'is_active' => 1,
                'created_at' => '2018-02-19 05:43:02',
                'updated_at' => '2018-02-19 05:43:09',
            ),
            18 => 
            array (
                'id' => 19,
                'section_id' => 5,
                'parent_id' => 0,
                'name' => 'Statistics Dashboard',
                'type' => 'url',
                'path' => 'admin/statistics/show/statistics-dashboard',
                'icon' => 'fa-dashboard',
                'sort' => NULL,
                'is_active' => 1,
                'created_at' => '2018-03-04 11:07:03',
                'updated_at' => '2018-03-04 11:07:03',
            ),
            19 => 
            array (
                'id' => 20,
                'section_id' => 5,
                'parent_id' => 0,
                'name' => 'Statistics Pages',
                'type' => 'url',
                'path' => 'admin/statisticspage',
                'icon' => 'fa-list-alt',
                'sort' => NULL,
                'is_active' => 1,
                'created_at' => '2018-03-04 11:07:41',
                'updated_at' => '2018-03-04 11:07:41',
            ),
            20 => 
            array (
                'id' => 21,
                'section_id' => 5,
                'parent_id' => 0,
                'name' => 'Statistics Sections',
                'type' => 'url',
                'path' => 'admin/statisticssection',
                'icon' => 'fa-th-large',
                'sort' => NULL,
                'is_active' => 1,
                'created_at' => '2018-03-04 11:08:35',
                'updated_at' => '2018-03-04 11:08:35',
            ),
            21 => 
            array (
                'id' => 22,
                'section_id' => 5,
                'parent_id' => 0,
                'name' => 'Statistics Widgets',
                'type' => 'url',
                'path' => 'admin/statisticswidget',
                'icon' => 'fa-line-chart',
                'sort' => NULL,
                'is_active' => 1,
                'created_at' => '2018-03-04 11:09:29',
                'updated_at' => '2018-03-04 11:09:29',
            ),
        ));
        
        
    }
}