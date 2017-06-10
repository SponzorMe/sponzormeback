<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        //Main sponzor
        DB::table('users')->insert(
        	[
        	'name' => 'Sponzor Sponzorme',
        	'email' => 'sponzor@sponzor.me',
        	'password' => Hash::make('sponzorme'),
        	'activated' => true,
        	'company' => 'Sponzorme',
        	'lang' => 'en',
        	'image' => 'https://s3-us-west-2.amazonaws.com/sponzormewebappimages/user_default.jpg',
        	'type' => '1',
        	'demo' => '0',
          'id' => '1002',
        	]);
        //Main organizer
        DB::table('users')->insert(
        	[
        	'name' => 'Organizer Sponzorme',
        	'email' => 'organizer@sponzor.me',
        	'password' => Hash::make('sponzorme'),
        	'activated' => true,
        	'company' => 'Sponzorme',
        	'lang' => 'en',
        	'image' => 'https://s3-us-west-2.amazonaws.com/sponzormewebappimages/user_default.jpg',
        	'type' => '0',
        	'demo' => '0',
          'id' => '1003',
        	]);

    }

}
