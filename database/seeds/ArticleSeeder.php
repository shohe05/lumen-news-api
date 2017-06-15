<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=100; $i++) {
            Article::create([
              'title' => "記事${i}",
              'body' => "記事${i}の本文",
            ]);
        }
    }
}
