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
        $this->createBlogTypes();
        $this->createBlogTopcs();
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
                'email' => 'admin@utu.com',
            ],
            [
                'name' => 'utu admin',
                'password' => \Illuminate\Support\Facades\Hash::make(config('app.admin_login_init_password'))
            ]
        );

        User::firstOrCreate(
            [
                'email' => 'admin@utu.one',
            ],
            [
                'name' => 'utu admin',
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

    private function createBlogTypes() {
        BlogType::firstOrCreate([
            'name' => 'Press Release',
        ]);
        BlogType::firstOrCreate([
            'name' => 'Announcement',
        ]);
        BlogType::firstOrCreate([
            'name' => 'Statement',
        ]);
        BlogType::firstOrCreate([
            'name' => 'Insights'
        ]);

    }

    private function createBlogTopcs() {
        Topic::firstOrCreate([
            'name' => 'Block Producers',
        ]);
        Topic::firstOrCreate([
            'name' => ' Blockchain Technology',
        ]);
        Topic::firstOrCreate([
            'name' => 'Utn.one',
        ]);
        Topic::firstOrCreate([
            'name' => 'Cryptocurrency',
        ]);
        Topic::firstOrCreate([
            'name' => ' Decentralization',
        ]);
    }

}
