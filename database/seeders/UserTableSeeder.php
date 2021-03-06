<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(User::class, 10)->create();
        // User::create([
        //     'name' => 'Leandro Velez',
        //     'email' => 'leandro@velez.com',
        //     'password' => bcrypt('123456'),
        // ]);
    }
}
