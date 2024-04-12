<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'name' => $this->faker->text(20),
            'made' => $this->faker->date(),
            'Company_id' => $this->faker->numberBetween(1,1),
            'updated_at' => null,
            'deleted_at' => null,
            'delete_time' => null,
            'created_at' => time(),
            'edit_time' => null,
            'create_time' => time(),
        ];
    }
}
