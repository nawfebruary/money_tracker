<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'user',
            'permissions' => '{}',
            'created_at' => now(),
            'created_at' => now(),
        ]);
    }
}
