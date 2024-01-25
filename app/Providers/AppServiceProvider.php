<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('formatRupiah', function ($expression) {
            return "<?php echo 'Rp. ' . number_format($expression, 0, ',', '.'); ?>";
        });

        Blade::directive('formatHarga', function ($expression) {
            return "<?php echo $expression >= 1000 ? rtrim(rtrim(number_format($expression / 1000, 2), '0'), '.') . 'k' : number_format($expression); ?>";
        });            
    }
}
