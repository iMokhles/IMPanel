<?php

use Illuminate\Database\Seeder;

class StatisticsSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statistics_sections')->delete();
        
        \DB::table('statistics_sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'statistics_page_id' => 1,
                'name' => 'Top Section',
                'cols' => 4,
                'sort' => 1,
                'is_active' => 1,
                'created_at' => '2018-03-04 02:51:18',
                'updated_at' => '2018-03-04 23:36:26',
            ),
            1 => 
            array (
                'id' => 2,
                'statistics_page_id' => 1,
                'name' => 'Tables Section',
                'cols' => 4,
                'sort' => 2,
                'is_active' => 1,
                'created_at' => '2018-03-04 22:41:46',
                'updated_at' => '2018-03-04 23:36:26',
            ),
        ));
        
        
    }
}