<?php

namespace App\Infrastructure\Console\Commands;

use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Routing\Console\ControllerMakeCommand;

class ControllerDomainCommand extends ControllerMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:controller';

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
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }

    protected function generateRouter()
    {   
        $domain = $this->argument('domain');
        $routerPath = app_path() . "/Domain/" . $domain . '/Routes/' . config('app.version') . '/';

        if(!File::exists($routerPath . 'api.php')) {
            if ($this->confirm("An API router for this domain does not exist. Do you want to generate it?", true)) {
                $this->call('domain:api:router', [
                    'name' => $domain
                ]);
            }
        }

        if(!File::exists($routerPath . 'web.php')) {
            if ($this->confirm("An Web router for this domain does not exist. Do you want to generate it?", true)) {
                $this->call('domain:web:router', [
                    'name' => $domain
                ]);
            }
        }
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
        
        $this->generateRouter();

        return $rootNamespace . '\Domain\\' . $domain . '\Controllers\\' . config('app.version') . '\\' . $model;
    }
}
