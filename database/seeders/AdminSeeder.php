<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;
use Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datacount = Admin::count();

        if($datacount == 0){
            Admin::create([
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456789'),
                'remember_token' => str::random(10),
            ]);            
        }
    }
}
