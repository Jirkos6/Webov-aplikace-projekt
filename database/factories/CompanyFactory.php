<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{protected $model = Company::class;
       /**
     * Define the model's default state.

     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'name' => $this->faker->text(20),
            'Country_id' =>$this->faker->numberBetween(1,1), 
        ];
    }
}
