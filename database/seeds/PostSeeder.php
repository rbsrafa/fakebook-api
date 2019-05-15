<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
          'body' => 'Post Body',
          'image' => Null,
          'description' => "partying at someone\' house",
          'user_id' => '1',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
          'body' => 'Post Body',
          'image' => Null,
          'description' => "cooking for dinner",
          'user_id' => '1',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
          'body' => 'Post Body',
          'image' => Null,
          'description' => "doing nothing",
          'user_id' => '1',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
