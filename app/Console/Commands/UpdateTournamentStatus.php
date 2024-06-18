<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tournament;
use Carbon\Carbon;

class UpdateTournamentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournament:update-status';
    protected $description = 'Update the status of tournaments that are older than 3 days';


    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the current date minus 3 days
        $oneDaysAgo = Carbon::now()->subDays(1);

        // Find tournaments that are older than 1 days and update their status
        Tournament::where('date', '<', $oneDaysAgo)
            ->update(['status' => 'past']);

            Tournament::whereDate('date', Carbon::now())
              ->update(['status' => 'present']);

        $this->info('Tournament statuses updated successfully.');
    }
}
