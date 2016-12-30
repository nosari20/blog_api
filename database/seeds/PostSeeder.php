<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Category;
use App\Post;
use App\Comment;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $nb_categories = 5;
        $nb_posts = 10;
        $nb_comments = 50;

        foreach (range(1,$nb_categories) as $index) {
            DB::table(with(new Category)->getTable())->insert([
	            'title' => $faker->word(),
	            'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
	        ]);
        }


    	foreach (range(1,$nb_posts) as $index) {
	        DB::table(with(new Post)->getTable())->insert([
	            'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
	            'subtitle' => $faker->sentence($nbWords = 6, $variableNbWords = true),
	            'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'category_id' => Category::inRandomOrder()->first()->id,
                'tags' => $faker->word().','.$faker->word().','.$faker->word(),
                'created_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
                'updated_at' => new \DateTime('NOW'),
	        ]);
        }

        foreach (range(1,$nb_comments) as $index) {
            DB::table(with(new Comment)->getTable())->insert([
	            'author' => $faker->word(),
	            'text' => $faker->sentence($nbWords = $faker->numberBetween($min = 3, $max = 12), $variableNbWords = true),
                'post_id' => Post::inRandomOrder()->first()->id,
                'created_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
                'updated_at' => new \DateTime('NOW'),
	        ]);
        }
    }
}
