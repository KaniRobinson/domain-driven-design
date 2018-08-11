<?php

namespace App\Infrastructure\Console\Commands;

use Illuminate\Routing\Console\MiddlewareMakeCommand;

class MiddlewareDomainCommand extends MiddlewareMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:middleware';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Infrastructure\Middleware';
    }
}
