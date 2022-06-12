<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
use App\Models\Experience;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'nord',
            'email' => 'nord@coders.com'
        ]);

        Experience::factory(10)->create([
            'profile_id' => $user->profile->id
        ]);

        Link::factory(3)->create([
            'profile_id' => $user->profile->id
        ]);
    }
}
