<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      	 DB::table('users')->insert([
            'name' => 'admin1',
            'email' => 'admin1@email.com',
            'password' => bcrypt('1234'),
            'type' => 'admin',
            'phone'=>'088989999',
            'imagePath'=>'https://scontent.fplm1-1.fna.fbcdn.net/v/t31.0-8/fr/cp0/e15/q65/22791726_1952306635032348_3694174331524716402_o.jpg?efg=eyJpIjoidCJ9&oh=775fe73cb15bd27b39864c529aac184b&oe=5AA9D5DC'
        ]);

      	 
      
    }
}
