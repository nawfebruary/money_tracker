<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                "id" => 1,
                "name" => "Salary",
                "type" => "income",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 2,
                "name" => "Freelance",
                "type" => "income",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 3,
                "name" => "Business",
                "type" => "income",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 4,
                "name" => "Investment",
                "type" => "income",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 5,
                "name" => "Rental",
                "type" => "income",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 6,
                "name" => "Royalties",
                "type" => "income",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 7,
                "name" => "Gifts",
                "type" => "income",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 8,
                "type" => "income",
                "name" => "Inheritance",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 9,
                "type" => "income",
                "name" => "Awards",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 10,
                "type" => "income",
                "name" => "Other",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 11,
                "type" => "expense",
                "name" => "Housing",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 12,
                "name" => "Food",
                "type" => "expense",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 13,
                "type" => "expense",
                "name" => "Transportation",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 14,
                "type" => "expense",
                "name" => "Utilities",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 15,
                "type" => "expense",
                "name" => "Entertainment",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 16,
                "type" => "expense",
                "name" => "Medical",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 17,
                "type" => "expense",
                "name" => "Education",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 18,               
                 "type" => "expense",
                "name" => "Personal Care",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 19,
                "type" => "expense",
                "name" => "Travel",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 20,
                "type" => "expense",
                "name" => "Other",
                "status" => "default",
                'created_at' => now(),
                'created_at' => now(),
            ],

        ]);
    }
}
