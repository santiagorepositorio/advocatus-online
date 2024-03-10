<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'version' => 'v17.0',
            'phoneId' => '187502877787477',
            'wabaId' => '194066743797639',
            'accessToken' => 'EAAMWeDYDsCYBOyvC42rUM6tsXLU2J5j1gZB6Nv1ZCjnIYKcdPy8MhFGSCdVqWqz3TqOqXNaZAS23XyY4E3YJBDwGG6vtMCvgBa10D7mzf3H4ElU8uhs8SaPTURpxulu1xq1gm2V53VZChi2jfRQt2uZAurBilT23okEaNBlkXWgqu2g2E0PnZC7mmjafipegbMhoZBn53vI1v5KTxV7',
            'verifyToken' => 'universidad',
            'status' => 1,
            'user_id' => 1,

        ]);

        
    }
}
