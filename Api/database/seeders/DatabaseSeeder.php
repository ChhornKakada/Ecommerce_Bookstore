<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();
		$this->call([
			GenreSeeder::class,
			AuthorSeeder::class,
			BookSeeder::class,
			RoleSeeder::class,
            PaymentMethodSeeder::class,
            ShippingCompanySeeder::class,
            UserSeeder::class
		]);
	}
}
