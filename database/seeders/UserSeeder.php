<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    const MAX_RECORDS = 100;
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate table
        DB::table('users')->truncate();
        DB::table('user_roles')->truncate(); // Truncate bảng user_role nếu có

        // Insert roles nếu chưa có
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Insert admin user
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Gán vai trò admin cho admin user
        $adminUser->roles()->attach($adminRole);

        // Insert regular users
        for ($i = 1; $i < self::MAX_RECORDS; $i++) {
            $user = User::create([
                'name' => 'user' . $i,
                'email' => "user{$i}@gmail.com",
                'email_verified_at' => now(),
                'password' => Hash::make('123456'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Gán vai trò user cho người dùng
            $user->roles()->attach($userRole);
        }
    }
}
