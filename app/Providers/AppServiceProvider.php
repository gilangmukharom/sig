<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

        public function calculateTotalBeforeDiscount($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'];
        }
        return $total;
    }

    public function calculateTotalDiscount($cart)
    {
        $totalDiscount = 0;
        foreach ($cart as $item) {
            $totalDiscount += $item['harga'] * ($item['discount'] / 100);
        }
        return $totalDiscount;
    }

    public function calculateTotalAfterDiscount($cart)
    {
        return $this->calculateTotalBeforeDiscount($cart) - $this->calculateTotalDiscount($cart);
    }
    }
