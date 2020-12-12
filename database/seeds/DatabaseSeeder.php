<?php

use Illuminate\Database\Seeder;
use App\User;
use App\BlogType;
use App\Topic;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdminAccount();
    }

    private function createAdminAccount() {
        User::firstOrCreate(
            [
                'email' => 'louis@utu.com',
            ],
            [
                'name' => 'Louis Liu',
                'password' => \Illuminate\Support\Facades\Hash::make(config('app.admin_login_init_password'))
            ]
        );


        User::firstOrCreate(
            [
                'email' => config('app.api_user_email'),
            ],
            [
                'name' => 'utu developer',
                'password' => \Illuminate\Support\Facades\Hash::make(config('app.api_user_password'))
            ]
        );
    }


}
