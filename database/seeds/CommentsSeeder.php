<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 200; $i++) {
            DB::table('comments')->insert([
                'user_id' => rand(1,21),
                'newspaper_id' => rand(1, 100),
                'comment' => str_random(20),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }//
    }
}
