<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firstCategoryId = DB::table('categories')->value('id');
        $firstUserId = DB::table('users')->value('id');

        DB::table('articles')->insert(
       [
            [
                'title'      => 'Les bases de Laravel pour bien démarrer',
                'slug'       => 'les-bases-de-laravel-pour-bien-demarrer',
                'content'    => 'Laravel est un framework PHP qui facilite grandement le développement d\'applications web modernes. Dans cet article, nous allons voir comment installer Laravel, comprendre l\'arborescence d\'un projet et créer votre première route.',
                'created_at' => Carbon::create(2026, 3, 12, 9, 15, 0),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title'      => 'Comprendre le routing en PHP natif',
                'slug'       => 'comprendre-le-routing-en-php-natif',
                'content'    => 'Avant d\'utiliser un framework, il est essentiel de comprendre comment fonctionne le routage HTTP en PHP pur. Nous verrons comment intercepter les requêtes, analyser l\'URL et rediriger vers le bon contrôleur.',
                'created_at' => Carbon::create(2026, 3, 18, 14, 30, 0),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title'      => 'Les migrations Laravel expliquées simplement',
                'slug'       => 'les-migrations-laravel-expliquees-simplement',
                'content'    => 'Les migrations permettent de versionner la structure de votre base de données comme du code. Découvrez comment créer, modifier et rollback vos migrations avec Artisan.',
                'created_at' => Carbon::create(2026, 4, 2, 10, 0, 0),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title'      => 'Eloquent ORM : manipuler sa base de données facilement',
                'slug'       => 'eloquent-orm-manipuler-sa-base-de-donnees-facilement',
                'content'    => 'Eloquent est l\'ORM natif de Laravel. Il permet de manipuler les enregistrements de votre base sous forme d\'objets PHP, sans écrire de SQL brut. Nous verrons les relations, les scopes et les accessors.',
                'created_at' => Carbon::create(2026, 4, 15, 16, 45, 0),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title'      => 'Créer une authentification avec Laravel Breeze',
                'slug'       => 'creer-une-authentification-avec-laravel-breeze',
                'content'    => 'Breeze est un package officiel qui fournit une base d\'authentification minimaliste : inscription, connexion, réinitialisation de mot de passe. Idéal pour démarrer rapidement un projet sécurisé.',
                'created_at' => Carbon::create(2026, 5, 1, 8, 20, 0),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title'      => 'Les Blade templates : structurer ses vues efficacement',
                'slug'       => 'les-blade-templates-structurer-ses-vues-efficacement',
                'content'    => 'Le moteur de templates Blade offre des directives puissantes comme @if, @foreach ou @include. Apprenez à créer des layouts réutilisables pour éviter la duplication de code dans vos vues.',
                'created_at' => Carbon::create(2026, 5, 20, 11, 10, 0),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title'      => 'Débugger une erreur HTTP 500 sous Laravel',
                'slug'       => 'debugger-une-erreur-http-500-sous-laravel',
                'content'    => 'Une erreur 500 peut avoir de multiples origines : permissions de fichiers, variables d\'environnement manquantes, erreur de syntaxe. Voici une méthode pas à pas pour identifier la cause rapidement.',
                'created_at' => Carbon::create(2026, 6, 5, 13, 0, 0),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title'      => 'Déployer son projet Laravel avec GitHub Actions',
                'slug'       => 'deployer-son-projet-laravel-avec-github-actions',
                'content'    => 'L\'intégration continue permet d\'automatiser les tests et le déploiement à chaque push. Nous verrons comment configurer un workflow GitHub Actions simple pour un projet Laravel.',
                'created_at' => Carbon::create(2026, 6, 22, 17, 30, 0),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
        ]);
        
        
    
    }  
    
}
