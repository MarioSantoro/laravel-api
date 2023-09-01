<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $myUser = new User();
        $myUser->name = 'Mario';
        $myUser->email = 'mariosantoro124@gmail.com';
        $myUser->password = Hash::make('Mario123');
        $myUser->save();
        $myUser->roles()->sync([1]);
        $myUser->save();
    }
}
