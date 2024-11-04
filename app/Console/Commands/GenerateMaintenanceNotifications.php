<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\NotificationService;

class GenerateMaintenanceNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:generate-maintenance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate notifications for upcoming and overdue maintenance';

    protected $notificationService;

    /**
     * Create a new command instance.
     *
     * @param NotificationService $notificationService
     */
    public function __construct(NotificationService $notificationService)
    {
        parent::__construct();
        $this->notificationService = $notificationService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->notificationService->generateMaintenanceNotifications();
        $this->info('Maintenance notifications generated successfully.');
    }
}
