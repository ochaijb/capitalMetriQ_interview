<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name' => 'MTN Airtime', 'status' => 1],
            ['name' => 'Airtel Airtime', 'status' => 1],
            ['name' => 'Glo Airtime', 'status' => 1],
            ['name' => '9Mobile Airtime', 'status' => 1],
            ['name' => 'MTN Data', 'status' => 1],
            ['name' => 'Airtel Data', 'status' => 1],
            ['name' => 'Glo Data', 'status' => 1],
            ['name' => '9Mobile Data', 'status' => 1],
        ];

        foreach ($services as $service) {
            Service::create([
                'name' => $service['name'],
                'slug' => Str::slug($service['name']),
                'status' => $service['status'],
            ]);
        }
    }
}
