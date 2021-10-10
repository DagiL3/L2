<?php

namespace Database\Factories;


use App\Models\Cour;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Formation;

class CourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'intitule' => $this->faker->word(),
            'user_id' =>User::factory(),
            'formation_id'=>Formation::factory(), 
        ];
    }
}
