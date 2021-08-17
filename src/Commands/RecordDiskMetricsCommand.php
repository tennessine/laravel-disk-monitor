<?php

namespace Tennessine\DiskMonitor\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Tennessine\DiskMonitor\Models\DiskMonitorEntry;

class RecordDiskMetricsCommand extends Command
{
    public $signature = 'disk-monitor:record-metrics';

    public $description = 'Record the metrics of a disk';

    public function handle()
    {
        $this->comment('Recording metrics...');

        $disk_name = config('disk-monitor.disk_name');

        $file_count = count(Storage::disk($disk_name)->allFiles());

        DiskMonitorEntry::create([
            'disk_name' => $disk_name,
            'file_count' => $file_count,
        ]);

        $this->comment('All done');
    }
}
