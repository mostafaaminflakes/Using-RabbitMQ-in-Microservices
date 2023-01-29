<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProjectInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init the project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('key:generate', []);
        $this->call('migrate');
        $this->call('db:seed');
        $this->call('serve', ['--host' => '0.0.0.0']);
    }
}
