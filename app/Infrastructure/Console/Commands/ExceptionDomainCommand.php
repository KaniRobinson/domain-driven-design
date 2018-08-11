<?php

namespace App\Infrastructure\Console\Commands;

use Illuminate\Foundation\Console\ExceptionMakeCommand;

class ExceptionDomainCommand extends ExceptionMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:exception';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Infrastructure\Exceptions';
    }
}
