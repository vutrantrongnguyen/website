<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class NewspapersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<100;$i++) {
            DB::table('newspapers')->insert([
                'title' => str_random(10),
                'content' => str_random(400),
                'user_id' => rand(1, 21),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);  //
        }
    }
}
