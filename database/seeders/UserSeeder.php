<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'fullName' => 'John Deo',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'gender' => 'male',
            'dob' => 1234546,
            'completeAddress' => 'Street 1 Block B',
            'city' => 'Lahore',
            'postalCode' => 012345,
            'state' => 'Punjab',
            'country' => 'Pakistan',
            'phoneNumber' => 9212345678,
            'role' => 'admin',
            'avatar' => 'upload/user/',
            'regionId' => 2322,
            'emergencyContactName' => 'John Deo',
            'emergencyContactRelation' => 'Deo',
            'emergencyContactNumber' => 333332232,
            'bio' => 'bio',
            'deviceIdentifire' => 221,
            'deviceName' => 'samsung',
            'fcmToken' => 212121,
            'status' => 'active',
        ]);
    }
}
