<?php

namespace App\Infrastructure\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use \Illuminate\Foundation\Console\ObserverMakeCommand;

class ObserverDomainCommand extends ObserverMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:observer';

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['domain', InputArgument::REQUIRED, 'The name of the class'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $domain = $this->argument('domain');
        
        return $rootNamespace . '\Domain\\' . $domain . '\Observers';
    }
}
