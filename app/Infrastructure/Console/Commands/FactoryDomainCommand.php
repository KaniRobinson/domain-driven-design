<?php

namespace App\Infrastructure\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use \Illuminate\Database\Console\Factories\FactoryMakeCommand;

class FactoryDomainCommand extends FactoryMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:factory';

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
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $domain = $this->argument('domain');
        $name = str_replace(
            ['\\', '/'], '', $this->argument('name')
        );

        return $this->laravel->databasePath() . "/factories//" . $domain . "/" . $name . "Factory.php";
    }
}
