<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ]);
            DB::table('newspapers')->insert([
                'title' => str_random(10),
                'content' => str_random(400),
                'user_id' => rand(0, 100),
            ]);

            DB::table('comments')->insert([
                'user_id' => rand(1,100),
                'newspaper_id' => rand(1, 100),
                'comment' => str_random(20),
            ]);

        }
        // $this->call(UsersTableSeeder::class);
    }
    // $this->call(UsersTableSeeder::class);

}
