<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Hashing\HashManager;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        /** @var \Illuminate\Foundation\Application $app */
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();
        $app->make(HashManager::class)->driver('bcrypt')->setRounds(4);

        return $app;
    }
}
