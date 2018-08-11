<?php

namespace App\Infrastructure\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AuthDomainCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain:auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold REST authentication: Login, Logout, Register, Reset Password, Forgot Password, Email Confirmation and Resend Email Confirmation.';

    /**
     * Authentication Folder Path
     *
     * @var string
     */
    protected $authPath = 'Infrastructure/Authentication/';

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
     * Create Notification Files
     *
     * @return void
     */
    protected function createAndMigrateNotifications()
    {
        $folder = app_path("Domain/User/Notifications/");
        $stubs = glob(__DIR__ . "/stubs/auth/Notifications/User/*.stub");

        if(!File::exists($folder)) {
            mkdir($folder);
        }

        foreach($stubs as $stub) {
            $fileName = substr(basename($stub), 0, -5);

            if(File::exists("{$folder}{$fileName}.php")) {
                if (!$this->confirm("{$fileName} already exists, do you want to continue?", true)) {
                    continue;
                }
            }

            $this->info("Creating {$fileName}.");

            File::put(
                "{$folder}{$fileName}.php",
                str_replace(
                    'DummyNamespace',
                    trim($this->laravel->getNamespace(), '\\'),
                    File::get($stub)
                )
            );
        }
    }

    /**
     * Create and Migrate Stub Files
     *
     * @return void
     */
    protected function createAndMigrateFiles($type)
    {
        $folder = app_path("{$this->authPath}{$type}/");
        $stubs = glob(__DIR__ . "/stubs/auth/{$type}/*.stub");

        if(!File::exists($folder)) {
            mkdir($folder);
        }

        foreach($stubs as $stub) {
            $fileName = substr(basename($stub), 0, -5);

            if(File::exists("{$folder}{$fileName}.php")) {
                if (!$this->confirm("{$fileName} already exists, do you want to continue?", true)) {
                    continue;
                }
            }

            $this->info("Creating {$fileName}.");

            File::put(
                "{$folder}{$fileName}.php",
                str_replace(
                    'DummyNamespace',
                    trim($this->laravel->getNamespace(), '\\'),
                    File::get($stub)
                )
            );
        }
    }

    /**
     * Create Authentication Folder
     *
     * @return void
     */
    protected function createAuthentication()
    {
        $folder = app_path($this->authPath);

        if(File::exists($folder)) {
            if (!$this->confirm("The Authentication folder already exists, do you want to continue?", true)) {
                $this->error('Aborted Authentication Creation');
                exit();
            }
        }

        if(!File::exists($folder)) {
            $this->info('Creating Authentication Structure');

            mkdir($folder);
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createAuthentication();
        $this->createAndMigrateFiles('Controllers');
        $this->createAndMigrateFiles('Proxies');
        $this->createAndMigrateFiles('Routes');
        $this->createAndMigrateFiles('Validators');
        $this->createAndMigrateNotifications();
        
        $this->info('');
        $this->warn('Please run `php artisan password:client --password` and add it to your .env file as PASSWORD_CLIENT_ID and PASSWORD_CLIENT_SECRET');
    }
}
