<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create();
      	foreach (range(1,20) as $index) {
  	        DB::table('users')->insert([
  	            'name' => $faker->name,
  	            'email' => $faker->email,
  	            'password' => bcrypt('secret'),
  	        ]);
          }
    }
}
