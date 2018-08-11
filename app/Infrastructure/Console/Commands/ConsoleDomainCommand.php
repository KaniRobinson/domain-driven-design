<?php

namespace App\Infrastructure\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Foundation\Console\ConsoleMakeCommand;

class ConsoleDomainCommand extends ConsoleMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:command';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {   
        return $rootNamespace . '\Infrastructure\Console\Commands';
    }
}
