<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Guesser\Name;
use App\Models\ContactUs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactUs>
 */
class ContactUsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactUs::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            // 'name'=> User::factory(),
            'name' => function (array $attributes) {
                return User::find($attributes['user_id'])->name;
            },
           'email' => $this->faker->unique()->safeEmail(),
           'phone'=> $this->faker->phoneNumber(),
           'subject'=> $this->faker->sentence(),
           'message'=> $this->faker->paragraph(),
        ];
    }
}
