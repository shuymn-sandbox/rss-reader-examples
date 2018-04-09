<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @param BladeCompiler $compiler
     * @return void
     */
    public function boot(BladeCompiler $compiler)
    {
        $this->registerAliases($compiler);
    }

    /**
     * @param BladeCompiler $compiler
     */
    protected function registerAliases(BladeCompiler $compiler)
    {
        $compiler->component('components.header', 'header');
        $compiler->component('components.footer', 'footer');
    }
}
