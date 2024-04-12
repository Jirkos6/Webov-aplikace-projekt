<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{protected $model = Country::class;
        /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   

    public function definition():array
    {
        return [
            'name' => $this->faker->text(20),
            'shortcut' => $this->faker->text(5),
            'flag' =>$this->faker->text(5), 
        ];
    }
}
