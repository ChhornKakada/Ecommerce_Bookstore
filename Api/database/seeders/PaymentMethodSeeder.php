<?php

namespace Database\Seeders;

use App\Models\Payment_method;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{

    private $typies = ['credit card', 'paypal'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->typies as $type) {
            Payment_method::create([
                'type' => $type,
            ]);
        }

    }
}
