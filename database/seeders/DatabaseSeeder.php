<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $category = Category::factory()->create();
        $user = User::factory()->create();
        $course = Course::factory()->create(['user_id' => $user->id]);
        $article = Article::factory()->create(['user_id' => $user->id]);
        $article->categories()->attach($category->id);
        $this->call(RolePermissionSeeder::class);
    }
}
