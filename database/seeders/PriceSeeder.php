<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'name' => 'Gratis',
            'value' => 0
        ]);

        Price::create([
            'name' => '200 Bs.',
            'value' => 200
        ]);

        Price::create([
            'name' => '100 Bs.',
            'value' => 100
        ]);

        Price::create([
            'name' => '50 Bs.',
            'value' => 50
        ]);
    }
}
