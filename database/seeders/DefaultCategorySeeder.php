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
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 2,
                "name" => "Freelance",
                "type" => "income",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 3,
                "name" => "Business",
                "type" => "income",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 4,
                "name" => "Investment",
                "type" => "income",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 5,
                "name" => "Rental",
                "type" => "income",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 6,
                "name" => "Royalties",
                "type" => "income",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 7,
                "name" => "Gifts",
                "type" => "income",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 8,
                "type" => "income",
                "name" => "Inheritance",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 9,
                "type" => "income",
                "name" => "Awards",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 10,
                "type" => "income",
                "name" => "Other",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 11,
                "type" => "expense",
                "name" => "Housing",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 11,
                "name" => "Food",
                "type" => "expense",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 12,
                "type" => "expense",
                "name" => "Transportation",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 13,
                "type" => "expense",
                "name" => "Utilities",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 14,
                "type" => "expense",
                "name" => "Entertainment",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 15,
                "type" => "expense",
                "name" => "Medical",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 16,
                "type" => "expense",
                "name" => "Education",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 17,               
                 "type" => "expense",
                "name" => "Personal Care",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 18,
                "type" => "expense",
                "name" => "Travel",
                'created_at' => now(),
                'created_at' => now(),
            ],
            [
                "id" => 19,
                "type" => "expense",
                "name" => "Other",
                'created_at' => now(),
                'created_at' => now(),
            ],

        ]);
    }
}
