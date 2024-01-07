<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dummyData() as $key) {
            $user = User::where('email', $key['email'])->first();

            if (!$user) {
                $users = new User();
                $users->email = $key['email'];
                $users->name = $key['name'];
                $users->role = $key['role'];
                $users->password = Hash::make($key['password']);
                $users->save();
            }
        }

    }


    /**
     * @return array[]
     */
    public function dummyData(): array
    {
        return [
            1 => [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 1,
                'password' => 'password'
            ],
            2 => [
                'name' => 'merchant',
                'email' => 'merchant@merchant.com',
                'role' => 2,
                'password' => 'password'
            ],
            3 => [
                'name' => 'user',
                'email' => 'user@user.com',
                'role' => 3,
                'password' => 'password'
            ],
        ];
    }
}
