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
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Renderer for h1...h6 headings with an auto-generated anchor
 */
class Heading extends Component
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
            return sprintf('<h%1$s><a name="%3$s" href="#%3$s">%2$s</a></h%1$s>', $level, $title, $link);
        };
    }
}
