<?php

namespace App\Infrastructure\Console\Commands;

use \Illuminate\Foundation\Console\ProviderMakeCommand;

class ProviderDomainCommand extends ProviderMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:provider';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Infrastructure\Providers';
    }
}
