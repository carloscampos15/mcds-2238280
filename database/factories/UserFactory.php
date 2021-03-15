<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* return [
            'fullname'          => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'birthdate'         => $this->faker->date,
            'gender'            => $this->faker->randomElement($array = array('Female', 'Male')),
            'address'           => $this->faker->streetAddress,
            'role'              => 'Editor',
            'email_verified_at' => now(),
            'password'          => bcrypt('editor'), 
            'remember_token'    => Str::random(10),
        ]; */

        $gender = $this->faker->randomElement($array = array('Female', 'Male'));
        $photo  = $this->faker->image('public/imgs', 140, 140, 'people');
        // lorempixel => placeholder.com

        if ($gender == 'Female') {
            $name = $this->faker->firstNameFemale();
        } else {
            $name = $this->faker->firstNameMale();
        }

        return [
            'fullname'          => $name . ' ' . $this->faker->lastname(),
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->numberBetween($min = 3101000000, $max = 3202000000 ),
            'birthdate'         => $this->faker->dateTimeBetween($starDate = '-60 years', $endDate = '-22 years'),
            //'birthdate'         => $this->faker->dateTimeBetween('1960-01-01', '1999-12-31'),
            'gender'            => $gender,
            'address'           => $this->faker->streetAddress,
            'photo'             => substr($photo, 7),
            'role'              => 'Editor',
            'email_verified_at' => now(),
            'password'          => bcrypt('editor'), 
            'remember_token'    => Str::random(10),
        ];

    }
}
