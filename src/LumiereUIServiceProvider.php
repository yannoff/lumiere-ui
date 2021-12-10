<?php

namespace Yannoff\Lumiere\UI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Yannoff\Lumiere\UI\View\Components\Header;
use Yannoff\Lumiere\UI\View\Components\Md;

/**
 * Register the Lumiere UI components
 */
class LumiereUIServiceProvider extends ServiceProvider
{
    /**
     * Map the components aliases to their respective classname
     *
     * @var string[]
     */
    protected $components = [
        'md' => Md::class,
        'header' => Header::class,
    ];

    /**
     * @return void
     */
    public function boot()
    {
        foreach ($this->components as $alias => $class) {
            Blade::component($class, $alias);
        }
    }
}