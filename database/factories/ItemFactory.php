<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Item::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'user_id' => User::inRandomOrder()->first()->id, // You can set a user ID here if needed
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
            'availabilities' => $this->faker->boolean,
            'booked' => $this->faker->boolean,
            'score_cost' => $this->faker->numberBetween(1, 100),
        ];
    }
}
