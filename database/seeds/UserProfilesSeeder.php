<?php

use Illuminate\Database\Seeder;
use App\Models\UserProfile;

class UserProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserProfile::class,20)->create();
    }
}
