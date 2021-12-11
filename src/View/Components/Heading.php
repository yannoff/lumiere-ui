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
use Yannoff\Lumiere\UI\Collection\HeadingList;

/**
 * Renderer for h1...h6 headings with an auto-generated anchor
 */
class Heading extends Component
{
    /**
     * Headings collection
     *
     * @var HeadingList
     */
    protected static $headings;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

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

            Heading::save($level, $title);
            $link = Heading::anchor($level);

            return sprintf('<h%1$s><a name="%3$s" href="#%3$s">%2$s</a></h%1$s>', $level, $title, $link);
        };
    }

    /**
     * Getter & initializer for the headings collection
     *
     * @return HeadingList
     */
    public static function headings(): HeadingList
    {
        if (null == self::$headings) {
            self::$headings = new HeadingList();
        }

        return self::$headings;
    }

    /**
     * Associate a label to its heading level in the heading list
     *
     * @param int    $level
     * @param string $label
     *
     * @return void
     */
    public static function save(int $level, string $label)
    {
        self::headings()[$level] = $label;
    }

    /**
     * Build the full (including ancestors) anchor name for the given heading level
     *
     * @param int $level
     *
     * @return string
     */
    public static function anchor(int $level): string
    {
        return self::headings()->slice($level)->slug();
    }
}
