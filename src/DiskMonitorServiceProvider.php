<?php

namespace Tennessine\DiskMonitor;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tennessine\DiskMonitor\Commands\RecordDiskMetricsCommand;

class DiskMonitorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('disk-monitor')
            ->hasConfigFile()
            ->hasViews()
<<<<<<< HEAD
            ->hasMigration( 'create_disk_monitor_table' )
            ->hasCommand( RecordDiskMetricsCommand::class );
=======
            ->hasMigration('create_disk_monitor_table')
            ->hasCommand(RecordDiskMetrics::class);
>>>>>>> 08e4873ee2c06110f2ec9c860afcdda02255d642
    }
}
