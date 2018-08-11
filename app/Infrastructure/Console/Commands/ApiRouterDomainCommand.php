<?php

namespace App\Infrastructure\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ApiRouterDomainCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'domain:api:router';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new api router file';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Router';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/router/api.stub';
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $domain = str_replace(
            ['\\', '/'], '', $this->argument('name')
        );

        return app_path() . "/Domain/" . $domain . "/Routes/" . config('app.version') . "/api.php";
    }
}
