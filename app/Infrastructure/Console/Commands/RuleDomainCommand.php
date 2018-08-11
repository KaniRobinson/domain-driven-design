<?php

namespace App\Infrastructure\Console\Commands;

use Illuminate\Foundation\Console\RuleMakeCommand;

class RuleDomainCommand extends RuleMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:rule';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Infrastructure\Rules';
    }
}
