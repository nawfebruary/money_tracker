<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 25517,
            'name' => 'bagankb',
            'email' => 'bkb@sample.com',
            'active' => '1',
            'password' => Hash::make('8#AoPZqIJgZ$Uslo7ZBK$')
        ]);
    }
}
