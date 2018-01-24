<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('languages')->delete();
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'English',
                'flag' => '',
                'abbr' => 'en',
                'script' => 'Latn',
                'native' => 'English',
                'active' => 1,
                'default' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Romanian',
                'flag' => NULL,
                'abbr' => 'ro',
                'script' => 'Latn',
                'native' => 'română',
                'active' => 0,
                'default' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'French',
                'flag' => '',
                'abbr' => 'fr',
                'script' => 'Latn',
                'native' => 'français',
                'active' => 0,
                'default' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Italian',
                'flag' => '',
                'abbr' => 'it',
                'script' => 'Latn',
                'native' => 'italiano',
                'active' => 0,
                'default' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Spanish',
                'flag' => '',
                'abbr' => 'es',
                'script' => 'Latn',
                'native' => 'español',
                'active' => 0,
                'default' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'German',
                'flag' => '',
                'abbr' => 'de',
                'script' => 'Latn',
                'native' => 'Deutsch',
                'active' => 0,
                'default' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Arabic',
                'flag' => NULL,
                'abbr' => 'ar',
                'script' => NULL,
                'native' => 'العربية',
                'active' => 1,
                'default' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}