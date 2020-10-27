<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
//use App\Models;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Models::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call(UsersTableSeeder::class);
        $this->command->info('users table seeded');

        $this->call(PostsTableSeeder::class);
        $this->command->info('posts table seeded');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        //Models::reguard();
    }
}
