<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Budget;

class DeleteExpiredBudgets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-budgets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete budgets that have expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $expiredBudgets = Budget::where('expires_at', '<', $now)->delete();
        $this->info("Expired budgets deleted.");
    }
}
