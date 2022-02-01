<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lists_id' => mt_rand(1, 3),
            'user_id' => 1,
            'title' => $this->faker->sentence(mt_rand(2, 4)),
            'slug' => $this->faker->slug(mt_rand(2, 3)),
            'desc' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                        ->map(fn($p) => "<p>$p</p>")
                        ->implode('')
        ];
    }
}
