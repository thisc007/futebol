<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        
        DB::table('players')->insert(
            [
                [
                    
                    'first_name' => 'Jogador',
                    'last_name' => 'Admin',
                    'level' => 5,
                    'is_goalkeeper' => true, 
                    'phone' => '11999900000', 
                ],
            ],
        );
    }
}


