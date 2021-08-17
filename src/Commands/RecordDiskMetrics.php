<?php

namespace Tennessine\DiskMonitor\Commands;

use Illuminate\Console\Command;

class RecordDiskMetrics extends Command
{
    public $signature = 'skeleton';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
