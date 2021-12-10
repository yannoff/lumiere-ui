<?php

namespace Yannoff\Lumiere\UI\View\Components;

use Closure;
use Illuminate\View\Component;

/**
 * Implement a basic markdown renderer
 */
class Md extends Component
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
        return function(array $data) {
            $slot2 = (string) $data['slot'];
            // Handle bold
            $slot2 = preg_replace('/__([^_]*)__/', '<b>\1</b>', $slot2);
            $slot2 = preg_replace('/\*\*([^\*]*)\*\*/', '<b>\1</b>', $slot2);
            // Handle italic
            $slot2 = preg_replace('/_([^_]*)_/', '<i>\1</i>', $slot2);
            $slot2 = preg_replace('/\*([^\*]*)\*/', '<i>\1</i>', $slot2);
            // Handle code excerpts
            $slot2 = preg_replace('/`([^`]*)`/', '<code>\1</code>', $slot2);

            return $slot2;
        };
    }
}
