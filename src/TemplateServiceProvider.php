<?php

declare(strict_types=1);

namespace HosmelQ\Template;

use Override;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TemplateServiceProvider extends PackageServiceProvider
{
    /**
     * Configure package.
     */
    #[Override]
    public function configurePackage(Package $package): void
    {
        $package
            ->name('template')
            ->hasConfigFile()
            ->hasInstallCommand(function (InstallCommand $command): void {
                $command
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('hosmelq/template')
                    ->publishConfigFile()
                    ->publishMigrations();
            })
            ->hasMigration('create_template_table');
    }
}
