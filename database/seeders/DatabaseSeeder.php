<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(HeroSeeder::class);
        
        // $this->call(UserSeeder::class);
        // $this->call(BlogSeeder::class);
        // $this->call(EventSeeder::class);
        // $this->call(SermonSeeder::class);
        // $this->call(SubscriptionSeeder::class);
    }
}
