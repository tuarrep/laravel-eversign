<?php

namespace Pinpon\LaravelEversign;

use Pinpon\LaravelEversign\Commands\LaravelEversignCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelEversignServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-eversign')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-eversign_table')
            ->hasCommand(LaravelEversignCommand::class);
    }
}
