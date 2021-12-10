<?php

namespace Yannoff\Lumiere\UI\View\Components;

use Closure;
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Renderer for h1...h6 headers with an auto-generated anchor
 */
class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure
     */
    public function render()
    {
        return function (array $data) {
            $title = $data['slot'];
            $level = $data['attributes']['level'] ?? 1;
            $link = Str::slug($title);
            return sprintf('<h%1$s><a name="%3$s">%2$s</a></h%1$s>', $level, $title, $link);
        };
    }
}
