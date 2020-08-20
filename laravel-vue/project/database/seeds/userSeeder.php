<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Jamil Ahmed',
            'email' => 'mdjamilaj1@gmail.com',
            'password' => bcrypt('ajstyle1'),
        ]);
    }
}
