<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data into the messages table
        DB::table('messages')->insert([
            [
                'title' => 'Welcome to our platform',
                'description' => 'We are glad to have you here. Enjoy your stay!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Maintenance Notification',
                'description' => 'Our site will be undergoing maintenance on Sunday at 2 AM.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'New Features Released',
                'description' => 'Check out the new features we have added in the latest update.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Discount Offer',
                'description' => 'Get a 20% discount on all our services for the next month.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Happy Holidays',
                'description' => 'Wishing you a wonderful holiday season and a happy new year!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
