<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Lee Kautzer',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'lacey.hammes@example.org',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => '39IehQVWUwhrvPNEMIAE9dQLidvQgK5erFBExBkbj37xNYkwtXKFDUWg53vn',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'gD8lxe72Wu',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mertie Schuster',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'bbosco@example.net',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => 'rZDAEB2BEeqdNWzt6P6zJoDJcsDRBUJY5b7ikk5IlwnRRCkca3mYY7q4wCWQ',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'IMClGeR3Fn',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Jacey Lebsack II',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'cjast@example.net',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => 'PEbRqFhcmgfufWb2Ia1Me4nQB3nu2TRCdMJQaioiL0XEhy4Mzf7PkVVB6bYE',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'G7McgapaUi',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Lavada Bednar',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'anya.kuvalis@example.com',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => 'KlCHfUJKOds9puflA586xhVwnG4bnNV6OejimvO8xBuoXYgA0nJor0xcS24E',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'qHonI9Scfc',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Geovanny Altenwerth II',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'markus.mckenzie@example.org',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => 'St5x9h14b2RogQ9CeriFewuvjKRu4dU6Wxn3egnP6hy3fxXzFVydxJm3USX8',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'usJ7FH6HrJ',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Prof. Kayleigh Jacobson',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'sschinner@example.net',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => 'guUEKs3fizzpMU4fYoba16N2A5bvqA594XxHXDh2agWZoaKJ6Fw5TTLqQTNS',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'IROG44iHTC',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Mrs. Ethelyn Zulauf',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'kennedy.schmeler@example.net',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => 'dZvL49xGOs2JdugLPzn1SYHujBwxTURGxfD7hAu14bLpJ5H8dWVjvZxRYIzG',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'mkOXNgfvO2',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Prof. Madison Bernier',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'laury55@example.org',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => 'zgPi8w2rmqN3V48YjTXht99wprVmEbyIoj4iTrMGbzUdgTIaBx6ZzS7FUba1',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'kcRgxtarY3',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Webster Cronin',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'ben.abernathy@example.org',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => 'FPlLzw5wxjAfT4XiWNy5skyC9KAUggHa9lCtjDbddbLpGGTuAwfsL7Wr8739',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'mab6dbTnOc',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Miss Felicita Nader Sr.',
                'avatar' => NULL,
                'username' => NULL,
                'about' => NULL,
                'phone' => NULL,
                'phone_hidden' => NULL,
                'email' => 'pacocha.kellen@example.com',
                'password' => '$2y$10$U/VZWw.XmPjRVFzRJ4F0Y.HPbJzB9S5BSfXcCk2JAqmXs05Qsedj2',
                'ip_addr' => NULL,
                'last_login_at' => NULL,
                'api_token' => '3nBkWoUfVU3oeDB89bLiLYbxj3nJLn0LVyAudhj68NjdPOsrGHXUzjGpi9Qs',
                'email_token' => NULL,
                'verified_email' => 0,
                'active' => 1,
                'blocked' => 0,
                'closed' => 0,
                'remember_token' => 'sAPIqMQ9xJ',
                'created_at' => '2018-03-04 10:09:55',
                'updated_at' => '2018-03-04 10:09:55',
            ),
        ));
        
        
    }
}