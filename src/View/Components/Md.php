<?php

/**
 * This file is part of the yannoff/lumiere-ui library
 *
 * (c) Yannoff (https://github.com/yannoff)
 *
 * For the full copyright and license information,
 * please view the LICENSE file bundled with this
 * source code.
 */

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
            // Handle natural links
            $slot2 = preg_replace('#(http(s)?://([^ ]*))#', '<a href="\1">\1</a>', $slot2);
            // Handle custom links: support both [label](url) and [label](url "title") formats
            $slot2 = preg_replace_callback('/\[([^\]]*)\]\(([^\) ]*)( "([^"]*)")?\)/', function ($matches) {
                return sprintf('<a href="%s" title="%s">%s</a>', $matches[2], ($matches[4] ?? $matches[1]), $matches[1]);
            }, $slot2);

            return $slot2;
        };
    }
}
