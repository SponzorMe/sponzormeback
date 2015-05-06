<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        //Main admin
       DB::table('users')->insert(
        	[
        	'name' => 'Admin Sponzorme',
        	'email' => 'admin@sponzor.me',
        	'password' => Hash::make('sponzorme'),
        	'activated' => true,
        	'company' => 'Sponzorme',
        	'lang' => 'en',
        	'image' => 'admin_sponzorme.png',
        	'type' => '2',
        	'demo' => '0',
        	]);
        //Main sponzor
        DB::table('users')->insert(
        	[
        	'name' => 'Sponzor Sponzorme',
        	'email' => 'sponzor@sponzor.me',
        	'password' => Hash::make('sponzorme'),
        	'activated' => true,
        	'company' => 'Sponzorme',
        	'lang' => 'en',
        	'image' => 'sponzor_sponzorme.png',
        	'type' => '1',
        	'demo' => '0',
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
        	'image' => 'organizer_sponzorme.png',
        	'type' => '0',
        	'demo' => '0',
        	]);
        
    }

}