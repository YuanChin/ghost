<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();

        $user = User::find(1);
        $user->name = 'Yuanchin';
        $user->email = 'cs861229503@gmail.com';
        $user->avatar = 'https://ghost.test/uploads/images/avatars/202202/24/1_1645707437_gGL3xOAPfx.jpg';
        $user->save();
    }
}
