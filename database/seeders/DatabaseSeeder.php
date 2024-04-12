<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Company;
use App\Models\Car;
use Database\Factories\CarFactory;
use Database\Factories\CountryFactory;
use Database\Factories\CompanyFactory;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        CarFactory::new()->count(50)->create();
        CompanyFactory::new()->count(50)->create();
        CountryFactory::new()->count(50)->create();
    }
}