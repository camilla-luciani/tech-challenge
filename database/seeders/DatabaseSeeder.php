<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
// use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        //creo 5 categorie
        Category::factory(5)->create();

        //creo 20 articoli
        //specifico che per category_id deve prendere un id casuale della tabella category
        Article::factory(20)->create([
            'category_id' => function() {
                //lo metto in una funzione altrimenti tutti gli articoli hanno lo stesso id
                return Category::inRandomOrder()->first()->id;
            }
        ]);
    }
}
