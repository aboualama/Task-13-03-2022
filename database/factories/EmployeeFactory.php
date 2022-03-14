<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    { 
        return [
            'first_name'            => $this->faker->name,
            'middle_name'           => $this->faker->name,
            'last_name'             => $this->faker->name,
            'family_name'           => $this->faker->name,
            'national_id'           => $this->faker->unique()->numberBetween(2125796237851,39999999999950),
            'birth_address'         => $this->faker->address,
            'birth_center'          => $this->faker->city,
            'birth_city'            => $this->faker->city,
            'birth_date'            => $this->faker->dateTime,
            'join_date'             => $this->faker->dateTime,
            'gender_id'             => $this->faker->randomElement([1 , 2]),
            'health_status_id'      => $this->faker->randomElement([1 , 2]),
            'social_status_id'      => $this->faker->randomElement([1 , 5]),
            'military_treatment_id' => $this->faker->randomElement([1 , 4]),
            'military_summons'      => $this->faker->sentence,
        ];
    }
}     

 