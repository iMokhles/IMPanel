<?php

use Illuminate\Database\Seeder;

class StatisticsPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statistics_pages')->delete();
        
        \DB::table('statistics_pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Statistics Dashboard',
                'slug' => 'statistics-dashboard',
                'created_at' => '2018-03-04 02:48:54',
                'updated_at' => '2018-03-04 02:48:54',
            ),
        ));
        
        
    }
}