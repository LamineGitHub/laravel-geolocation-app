<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ZoneFactory extends Factory
{
    protected $model = Zone::class;

    public function definition(): array
    {
        $latitude = $this->faker->longitude(-90, 90);
        $longitude = $this->faker->longitude(-180);

        return [
            'nom' => $this->faker->word(),
            'localisation' => $longitude . ', ' . $latitude,
            'description' => $this->faker->paragraph(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'region_id' => Region::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
