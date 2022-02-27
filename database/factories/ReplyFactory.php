<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Reply;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string|null
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
            'content'  => $this->faker->sentence(),
            'topic_id' => rand(1, 100),
            'user_id'  => rand(1, 10),
        ];
    }
}
