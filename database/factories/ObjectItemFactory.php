<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\Item;
use App\Models\ObjectItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObjectItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = ObjectItem::class;

    public function definition()
    {

        return [
            'item_id' => function () {
                return Item::factory()->create()->id;
            },
            'condition' => $this->faker->randomElement(['new', 'used', 'broken']),
            'category_id' => category::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
