<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'contact_email' => 'Admin@gmail.com',
                'phone_number' => '9989898656', // password
                'company_name' => 'AFS',
                'message' => 'This message from Admin side',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]
        ];

        if (!DB::table('contacts')->count()) {
            DB::table('contacts')->insert($contacts);
        }
    }
}
