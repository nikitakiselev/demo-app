<?php

namespace App\Providers;

use App\Models\Booking;
use Illuminate\Support\ServiceProvider;

/**
 * Class ViewComposerProvider
 * @package App\Providers
 */
class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('partials.sidebar', function ($view) {

            $newBookingsCount = Booking::where('status', Booking::BOOKING_NEW)->count();

            $view->with('newBookingsCount', $newBookingsCount);
        });
    }
}
