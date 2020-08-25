<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $super = User::create([
            'first_name' => 'Akash',
            'email' => 'akash@admin.com',
            'password' => Hash::make('admin123')
        ]);
    }
}
