<?php

use Illuminate\Database\Seeder;

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
        \App\User::firstOrCreate(
            [
                'email' => 'louis@utu.com',
            ],
            [
                'name' => 'Louis Liu',
                'password' => \Illuminate\Support\Facades\Hash::make(config('app.admin_login_init_password'))
            ]
        );

        \App\User::firstOrCreate(
            [
                'email' => 'admin@utu.com',
            ],
            [
                'name' => 'utu admin',
                'password' => \Illuminate\Support\Facades\Hash::make(config('app.admin_login_init_password'))
            ]
        );

        \App\User::firstOrCreate(
            [
                'email' => 'admin@utu.one',
            ],
            [
                'name' => 'utu admin',
                'password' => \Illuminate\Support\Facades\Hash::make(config('app.admin_login_init_password'))
            ]
        );
    }
}
