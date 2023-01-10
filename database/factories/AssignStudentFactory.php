<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssignStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => rand(1,10),
            'roll' => rand(1,10),
            'class_id' => rand(1,10),
            'year_id' => rand(1,10), // password
            'group_id' => rand(1,10), // password
            'shift_id' => rand(1,10),
        ];
    }
}
