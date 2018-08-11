<?php

namespace App\Infrastructure\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Foundation\Console\ModelMakeCommand;

class ModelDomainCommand extends ModelMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:model';

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
     * Create a model factory for the model.
     *
     * @return void
     */
    protected function createFactory()
    {
        // TODO: Me.
        $factory = Str::studly(class_basename($this->argument('name')));

        $this->call('make:factory', [
            'name' => "{$factory}Factory",
            '--model' => $this->argument('name'),
        ]);
    }

    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createController()
    {
        $controller = Str::studly(class_basename($this->argument('name')));
        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('domain:controller', [
            'domain' => $this->argument('domain'),
            'model' => $this->getNameInput(),
            'name' => "{$controller}Controller",
            '--model' => $modelName,
            '--api'
        ]);
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
        
        return $rootNamespace . '\Domain\\' . $domain . '\Models';
    }
}
