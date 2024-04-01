<?php

namespace Database\Factories;

use App\Models\Promoteur;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PromoteurFactory extends Factory
{
    protected $model = Promoteur::class;

    public function definition(): array
    {

        return [
            'nom' => $this->faker->name(),
            'tel' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'bp' => $this->faker->randomNumber(4, true),
            'user_id' => User::factory()->create()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
