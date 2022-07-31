<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'author_id' => $this->faker->randomDigitNotNull(),
            'category_id' => $this->faker->randomDigitNotNull(),
            'bookName' => $this->faker->word(2)
        ];
    }
}
