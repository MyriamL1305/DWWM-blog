<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'       => 'Laravel',
                'slug'       => 'laravel',
                'created_at' => Carbon::create(2026, 3, 1, 9, 0, 0),
            ],
            [
                'name'       => 'PHP',
                'slug'       => 'php',
                'created_at' => Carbon::create(2026, 3, 1, 9, 5, 0),
            ],
            [
                'name'       => 'Base de données',
                'slug'       => 'base-de-donnees',
                'created_at' => Carbon::create(2026, 3, 1, 9, 10, 0),
            ],
            [
                'name'       => 'Front-end',
                'slug'       => 'front-end',
                'created_at' => Carbon::create(2026, 3, 1, 9, 15, 0),
            ],
            [
                'name'       => 'DevOps',
                'slug'       => 'devops',
                'created_at' => Carbon::create(2026, 3, 1, 9, 20, 0),
            ],
            [
                'name'       => 'Bonnes pratiques',
                'slug'       => 'bonnes-pratiques',
                'created_at' => Carbon::create(2026, 3, 1, 9, 25, 0),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}