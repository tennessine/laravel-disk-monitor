<?php

namespace Tennessine\DiskMonitor\Tests\Feature\Commands;

use Illuminate\Support\Facades\Storage;
use Tennessine\DiskMonitor\Commands\RecordDiskMetricsCommand;
use Tennessine\DiskMonitor\Models\DiskMonitorEntry;
use Tennessine\DiskMonitor\Tests\TestCase;

class RecordDiskMetricsCommandTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Storage::fake('local');
    }

    /** @test */
    public function it_will_record_the_file_count_for_a_disk()
    {
        // Storage::disk( 'local' )->put( 'test', 'test' );

        $this->artisan(RecordDiskMetricsCommand::class)
             ->assertExitCode(0);

        // $this->assertCount( 1, DiskMonitorEntry::get() );

        $entry = DiskMonitorEntry::last();
        $this->assertEquals(0, $entry->file_count);

        Storage::disk('local')->put('test', 'test');

        $this->artisan(RecordDiskMetricsCommand::class)
             ->assertExitCode(0);

        $entry = DiskMonitorEntry::last();
        $this->assertEquals(1, $entry->file_count);
    }
}
