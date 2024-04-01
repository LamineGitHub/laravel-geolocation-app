<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Promoteur;
use App\Models\Region;
use App\Models\Terrain;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws RandomException
     */
    public function run(): void
    {
//        User::factory()->create();

        User::factory()->create([
            'name' => 'Lamine',
            'email' => 'test@test.com',
            'password' => Hash::make('test@test.com'),
            'remember_token' => Str::random(10),
        ]);

        Promoteur::factory(2)->create();

        Region::factory(3)->create();

        Zone::factory(3)->create();

        Terrain::factory(2)->create();
    }
}
