<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //body, question_id, user_id
            'body' => $this->faker->text(),
            'question_id' => function() {
                return Question::all()->random();
            },
            'user_id' => function() {
                return User::all()->random();
            }
        ];
    }
}
