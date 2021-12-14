<?php

namespace Yannoff\Lumiere\UI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Yannoff\Lumiere\UI\View\Components\Header;
use Yannoff\Lumiere\UI\View\Components\Heading;
use Yannoff\Lumiere\UI\View\Components\Md;

/**
 * Register the Lumiere UI components
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Map the components aliases to their respective classname
     *
     * @var string[]
     */
    protected $components = [
        'md' => Md::class,
        'heading' => Heading::class,
        // DEPRECATED: To be removed in 1.0
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
