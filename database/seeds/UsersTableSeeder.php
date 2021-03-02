<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\User::class, 5)->create();
	        
	        Role::create([
	        	'name'		=> 'Admin',
	        	'slug'  	=> 'slug',
	        	'special' 	=> 'all-access'
	        ]);

	        User::create([
	        	'name'		=> 'Admin',
	        	'email'  	=> 'admin@admin.com',
	        	'email_verified_at' => now(),
	        	'password' 	=> bcrypt('12344321'),
	        	'remember_token' => Str::random(10),
	        ]);
    }
}
