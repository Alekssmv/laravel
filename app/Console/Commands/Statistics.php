<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\StatisticsService;

class Statistics extends Command
{
    public function __construct(
        private readonly StatisticsService $statisticsService,
    )
    {
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $statistics = $this->statisticsService->getStatistics();

        $keys = array_keys($statistics);
        $values = array_values($statistics);

        $this->table(
            $keys,
            [$values]
        );

        return Command::SUCCESS;
    }
}
