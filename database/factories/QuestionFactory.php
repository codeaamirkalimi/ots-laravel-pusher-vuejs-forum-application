<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sentence = $this->faker->sentence();
        return [
            //title, slug, body, category_id, user_id
            'title' => $sentence,
            'slug'  => Str::slug($sentence),
            'body'  => $this->faker->text(),
            'category_id' => function() {
                return Category::all()->random();
            },
            'user_id' => function() {
                return User::all()->random();
            }
        ];
    }
}
