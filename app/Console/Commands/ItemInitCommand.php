<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ItemInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:init {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all components for Item';

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
     * @return mixed
     */
    public function handle()
    {
        $model = $this->argument('model');

        $modelPath = 'Models\\' . $model;

        Artisan::call('make:model', [
            'name' => $modelPath,
            '--migration' => true,
        ]);

        Artisan::call('make:controller', [
            'name' => $model . 'Controller',
            '--model' => $modelPath,
            '--api' => true,
        ]);

        Artisan::call('make:policy', [
            'name' => $model . 'Policy',
            '--model' => $modelPath,
        ]);

        Artisan::call('make:request', [
            'name' => $model . '\\Store' . $model . 'Request',
        ]);

        Artisan::call('make:request', [
            'name' => $model . '\\Update' . $model . 'Request',
        ]);

        Artisan::call('make:resource', [
            'name' => $model . '\\' . $model . 'sResource',
        ]);

        Artisan::call('make:resource', [
            'name' => $model . '\\' . $model . 'Resource',
        ]);

        Artisan::call('make:factory', [
            'name' => $model . 'Factory',
            '--model' => $modelPath,
        ]);

        Artisan::call('make:seeder', [
            'name' => $model . 'Seeder',
        ]);

        Artisan::call('make:test', [
            'name' => $model . 'Test',
        ]);

        return null;
    }
}
