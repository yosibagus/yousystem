<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('active', function ($expression) {
            return "<?php echo request()->is($expression) ? 'active' : ''; ?>";
        });

        Blade::directive('tanggal', function ($tgl) {
            return "<?php echo date('d-m-Y', strtotime($tgl)) ?>";
        });

        Blade::directive('jam', function ($jam) {
            return "<?php echo date('H:i', strtotime($jam)) ?>";
        });
    }
}
