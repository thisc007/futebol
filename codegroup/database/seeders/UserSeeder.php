<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $uuid = Str::uuid()->toString();
        DB::table('users')->insert(
            [
                [
                    'id' => $uuid,
                    'name' => 'Jogador Admin',
                    'created_at' => date('Y-m-d h:i:s'),
                    'email' => 'jogador@example.com', 
                    'password' => Hash::make('123456'), 
                ],
            ],
        );
    }
}
