<?php

namespace Pinpon\Eversign;

use Pinpon\Eversign\Facades\Eversign as EversignFacade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EversignServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-eversign')
            ->hasConfigFile();
    }

    public function packageRegistered()
    {
        $this->app->singleton(
            'eversign',
            static fn ($app) => Eversign::make(config('eversign.apiKey'))
                ->setBusinessId(config('eversign.businessId'))
        );
    }
}
