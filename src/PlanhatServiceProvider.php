<?php declare(strict_types=1);

namespace Bambamboole\LaravelPlanhat;

use Illuminate\Support\ServiceProvider;

class PlanhatServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/planhat.php', 'planhat');
    }
}
