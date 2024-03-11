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
            'name' => '1000 Bs.',
            'value' => 1000
        ]);
        Price::create([
            'name' => '950 Bs.',
            'value' => 950
        ]);
        Price::create([
            'name' => '900 Bs.',
            'value' => 900
        ]);
        Price::create([
            'name' => '850 Bs.',
            'value' => 850
        ]);
        Price::create([
            'name' => '800 Bs.',
            'value' => 800
        ]);
        Price::create([
            'name' => '750 Bs.',
            'value' => 750
        ]);
        Price::create([
            'name' => '700 Bs.',
            'value' => 700
        ]);
        Price::create([
            'name' => '650 Bs.',
            'value' => 650
        ]);
        Price::create([
            'name' => '600 Bs.',
            'value' => 600
        ]);
        Price::create([
            'name' => '550 Bs.',
            'value' => 550
        ]);
        Price::create([
            'name' => '500 Bs.',
            'value' => 500
        ]);
        Price::create([
            'name' => '450 Bs.',
            'value' => 450
        ]);
        Price::create([
            'name' => '400 Bs.',
            'value' => 400
        ]);
        Price::create([
            'name' => '350 Bs.',
            'value' => 350
        ]);
        Price::create([
            'name' => '300 Bs.',
            'value' => 300
        ]);

        Price::create([
            'name' => '250 Bs.',
            'value' => 250
        ]);
        Price::create([
            'name' => '200 Bs.',
            'value' => 200
        ]);

        Price::create([
            'name' => '150 Bs.',
            'value' => 150
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
