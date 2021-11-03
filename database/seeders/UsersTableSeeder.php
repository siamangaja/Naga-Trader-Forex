<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Admin;
        $user->name = "admin";
        $user->email = "admin@admin.com";
        $user->password = bcrypt('12345678');
        $user->status = 1;
        $user->save();
    }
}