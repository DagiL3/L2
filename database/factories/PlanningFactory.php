<?php

namespace Database\Factories;

use APP\Models\Planning;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use APP\Models\Cour;

class PlanningFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Planning::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cours_id' =>COUR::factory(),
            'date_debut' => $this->faker->dateTime(),
            'date_fin' => $this->faker->dateTime(), 
        ];
    }
}
