<?php

/*
 * This file is part of the Shrikeh SplFileRequirer package.
 *
 * (c) Barney Hanlon <barney@shrikeh.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Shrikeh\File\Includer;

use Closure;
use Shrikeh\File\Traits\SplFileInfoTrait;

final class SplFileIncluder implements IncluderInterface
{
    use SplFileInfoTrait;

    /**
     * {@inheritdoc}
     * @psalm-suppress UnresolvableInclude
     */
    public function include(bool $wrap = true)
    {
        $path = $this->getPath();

        return $wrap ? $this->wrap($path) : include $path;
    }

    /**
     * {@inheritdoc}
     * @psalm-suppress UnresolvableInclude
     */
    public function includeOnce()
    {
        return include_once $this->getPath();
    }

    /**
     * @param string $path
     * @return mixed
     * @psalm-suppress UnresolvableInclude
     */
    private function wrap(string $path)
    {
        /** @psalm-suppress MissingClosureReturnType */
        $wrapped = static function () use ($path) {
            return include $path;
        };

        return $wrapped();
    }
}
