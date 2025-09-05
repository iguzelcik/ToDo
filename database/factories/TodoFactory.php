<?php

namespace Database\Factories;

use App\Enums\TodoPriorityEnum;
use App\Enums\TodoStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'status' => $this->faker->randomElement(TodoStatusEnum::cases()),
            'priority' => $this->faker->randomElement(TodoPriorityEnum::cases()),
            'due_date' => $this->faker->optional()->date(),
            'completed_at' => $this->faker->optional()->date(),
            'is_starred' => $this->faker->boolean(20), 
            //
        ];
    }
}
