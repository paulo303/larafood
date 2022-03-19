<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Plano Básico',
            'url' => 'plano-basico',
            'price' => '29.99',
            'description' => 'Plano de entrada',
        ]);

        Plan::create([
            'name' => 'Plano Intermediário',
            'url' => 'plano-intermediario',
            'price' => '39.99',
            'description' => 'Plano com mais funcionalidades',
        ]);

        Plan::create([
            'name' => 'Plano Prime',
            'url' => 'plano-prime',
            'price' => '49.99',
            'description' => 'Plano completo',
        ]);
    }
}
