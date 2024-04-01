<?php

namespace Database\Factories;

use App\Models\Terrain;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TerrainFactory extends Factory
{
    protected $model = Terrain::class;

    public function definition(): array
    {
        return [
            'superficie' => $this->faker->randomNumber(4, true),
            'description' => $this->faker->paragraph(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'zone_id' => Zone::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
