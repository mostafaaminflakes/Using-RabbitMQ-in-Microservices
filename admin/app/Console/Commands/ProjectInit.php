<?php

namespace App\Console\Commands;

use App\Http\Controllers\API\AuthController;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;

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
        Artisan::call('key:generate');
        Artisan::call('migrate');
        Artisan::call('db:seed');
        Artisan::call('passport:install');
        Artisan::call('passport:client --no-interaction --name=Client1');
        app(AuthController::class)->create_sample_user();

        // Create a client
        // Get the passport client repository
        // $clientRepository = app('Laravel\Passport\ClientRepository');

        // // for machine-to-machine authentication
        // $client = $clientRepository->create(null, 'myclient1', '');

        // // gets the client's id and secret
        // $clientId = $client->id;
        // $clientSecret = $client->secret;
        // echo $clientId;
        // echo $clientSecret;
    }
}
