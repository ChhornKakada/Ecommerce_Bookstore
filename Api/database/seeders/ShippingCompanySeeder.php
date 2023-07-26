<?php

namespace Database\Seeders;

use App\Models\Shipping_company;
use Illuminate\Database\Seeder;

class ShippingCompanySeeder extends Seeder
{

    private $companies = ['ZTO', 'GNT'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->companies as $company) {
            Shipping_company::create([
                'company_name' => $company,
            ]);
        }
    }
}
