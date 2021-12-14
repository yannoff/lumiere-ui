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

/**
 * Renderer for h1...h6 headings with an auto-generated anchor
 *
 * @deprecated Support for the x-header component will be removed in 1.0
 */
class Header extends Heading
{
    /**
     * Header constructor: raise a deprecation warning
     *
     * @return void
     */
    public function __construct()
    {
        trigger_error(
            'The "x-header" component is deprecated and will be removed in version 1.0. Please use "x-heading" instead',
            E_USER_DEPRECATED
        );
    }
}
