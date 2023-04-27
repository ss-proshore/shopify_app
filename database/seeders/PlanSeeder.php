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
        //https://github.com/Kyon147/laravel-shopify/wiki/Creating-a-Billable-App

        $monthlyPlan = Plan::create([
            'type' => 'RECURRING',
            'name' => 'MOnthly Plan',
            'price' => '5.00',
            'interval' => 'EVERY_30_DAYS',
            'capped_amount' => '10.00',
            'terms' => 'Test terms',
            'trial_days' => 7,
            'test' => TRUE,
            'on_install' => 1
        ]);

        $annulPlan = Plan::create([
            'type' => 'RECURRING',
            'name' => 'Anual Plan',
            'price' => '60.00',
            'interval' => 'ANNUAL',
            'capped_amount' => '150.00',
            'terms' => 'Test terms',
            'trial_days' => 7,
            'test' => TRUE,
            'on_install' => 1
        ]);
    }
}
