<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
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
        for($i = 1;$i <= 100;$i++){
            $user = User::create([
                'name' => 'user'.$i,
                'is_admin' => 0,
                'email' => 'user'.$i.'@gmail.com',
                'phone' => '+959'.$i.'454'.rand(299,900).rand(10,90),
                'address' => strtoupper(Str::random(rand(5,8))),
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
            $role = Role::where('id',5)->first();
            $user->syncRoles($role);
        }
    }
}
