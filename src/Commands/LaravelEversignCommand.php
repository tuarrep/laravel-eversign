<?php

namespace Pinpon\LaravelEversign\Commands;

use Illuminate\Console\Command;

class LaravelEversignCommand extends Command
{
    public $signature = 'laravel-eversign';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
