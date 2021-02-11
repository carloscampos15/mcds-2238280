<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        $gender = $this->faker->randomElement(['male', 'female']);
        $user = [
            'name' => $this->faker->name($gender),
            'email' => $this->faker->unique()->safeEmail,
            'gender' => $gender,
            'cellphone' => $this->faker->numberBetween($min = 3101000000, $max = 3202000000),
            'birthdate' => $this->faker->dateTimeBetween($startDate = '-39 years', $endDate = '1999-12-31', $timezone = null),
            'password' => Hash::make("secret"),
        ];

        $user['photo_url'] = function($user){
            $image = file_get_contents($this->faker->imageUrl(800,600,'people'));
            $photo_url = "public/imgs/".$user['name'].".png";
            file_put_contents($photo_url, $image);
            return $photo_url;
        };
        return $user;
    }
}
