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

namespace Yannoff\Lumiere\UI\Collection;

use ArrayAccess;
use Countable;
use Iterator;

use Illuminate\Support\Str;

/**
 * Represent a collection of heading labels,
 * stored by their respective heading level
 */
class HeadingList implements ArrayAccess, Iterator, Countable
{
    /**
     * Minimal heading level
     *
     * @var int
     */
    const MIN_LEVEL = 1;

    /**
     * Maximal heading level
     *
     * @var int
     */
    const MAX_LEVEL = 6;

    /**
     * Separator used for the slug generation
     *
     * @var string
     */
    const URI_SEPARATOR = '-';

    /**
     * Separator used for the bread-crumbs generation
     *
     * @var string
     */
    const LABEL_SEPARATOR = ' > ';

    /**
     * Default locale for the slug generation
     *
     * @var string
     */
    const DEFAULT_LOCALE = 'en';

    /**
     * Locale to use for the slug generation
     *
     * @var string
     */
    protected $locale;

    /**
     * Heading labels registry
     *
     * @var array
     */
    protected $headings = [];

    /**
     * HeadingList constructor.
     *
     * @param array  $headings
     * @param string $locale
     */
    public function __construct(array $headings = [], string $locale = self::DEFAULT_LOCALE)
    {
        $this->headings = $headings;
        $this->locale = $locale;
    }

    /**
     * Return the bread-crumbs representation of the headings collection
     *
     * @param string $separator
     *
     * @return string
     */
    public function crumbs(string $separator = self::LABEL_SEPARATOR): string
    {
        return implode($separator, $this->headings);
    }

    /**
     * Return the slug representation of the headings collection
     *
     * @param string $separator
     *
     * @return string
     */
    public function slug(string $separator = self::URI_SEPARATOR): string
    {
        $raw = implode($separator, $this->headings);

        return Str::slug($raw, $separator, $this->locale);
    }

    /**
     * Extract a slice of heading labels, starting from self::MIN_LEVEL to the given level.
     *
     * @param int $level
     *
     * @return HeadingList The sliced version of the collection
     */
    public function slice(int $level): HeadingList
    {
        $sliced = [];

        for ($i = self::MIN_LEVEL; $i <= $level; $i++) {
            $sliced[] = $this->headings[$i] ?? null;
        }

        return new static(array_filter($sliced), $this->locale);
    }

    // ----- Countable implementation -----------------------------------------

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return count($this->headings);
    }

    // ----- ArrayAccess implementation ---------------------------------------

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->headings);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset): string
    {
        return $this->headings[$offset];
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->headings[$offset] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        unset($this->headings[$offset]);
    }

    // ----- Iterator implementation ------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return current($this->headings);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        return next($this->headings);
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return key($this->headings);
    }

    /**
     * {@inheritdoc}
     */
    public function valid(): bool
    {
        return (null !== $this->key());
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        return reset($this->headings);
    }
}
