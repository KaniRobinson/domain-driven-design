<?php

namespace App\Infrastructure\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Foundation\Console\RequestMakeCommand;

class RequestDomainCommand extends RequestMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:validator';

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['domain', InputArgument::REQUIRED, 'The name of the class'],
            ['model', InputArgument::REQUIRED, 'The name of the class'],
            ['controller', InputArgument::REQUIRED, 'The name of the class'],
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
        $model = $this->argument('model');
        $controller = $this->argument('controller');
        
        return $rootNamespace . '\Domain\\' . $domain . '\Validators\\' . $model . '\\' . $controller;
    }
}
