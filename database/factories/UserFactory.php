<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
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
        $gender = $this->faker->randomElement(['Male', 'Female']);
        $qualification = $this->faker->randomElement(['BTech', 'MTech', 'Bsc', 'others']);
        $languages = ['English', 'Telugu', 'Tamil'];
        $status = $this->faker->randomElement(['pending', 'approved','rejected']);

        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt($this->faker->password),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber,
            'dob' => $this->faker->dateTimeBetween('1980-01-01', '2012-12-31')->format('Y/m/d'),
            'gender' => $gender,
            'qualification' => $qualification,
            'languages' => $languages,
            'address' => $this->faker->address,
            'remember_token' => Str::random(10),
            'status' => $status
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    // public function unverified()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'email_verified_at' => null,
    //         ];
    //     });
    // }
}
