<?php

namespace Database\Factories;

use App\Models\Sport;
use App\Models\Trainer;
use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
                'name'=>fake()->name,
                'description'=>fake()->text(),
                'average'=>fake()->numberBetween([1,10]),
                'sport_id'=>Sport::all()->random()->id,
                'trainer_id'=>Trainer::all()->random()->id
        ];
    }
}
