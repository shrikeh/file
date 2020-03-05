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

namespace Shrikeh\File;

use Shrikeh\File\File\SplFileRequirer;
use Shrikeh\File\Includer\SplFileIncluder;

final class File
{
    /**
     * @param string $path
     * @param bool $wrap
     * @return mixed
     */
    public static function include(string $path, bool $wrap = true)
    {
        return SplFileIncluder::fromPath($path)->include($wrap);
    }

    /**
     * @param string $path
     * @param bool $wrap
     * @return mixed
     */
    public static function require(string $path, bool $wrap = true)
    {
        return SplFileRequirer::fromPath($path)->require($wrap);
    }

    /**
     * @param string[] $paths
     */
    public static function requireOnce(string ...$paths): void
    {
        foreach ($paths as $path) {
            SplFileRequirer::fromPath($path)->requireOnce();
        }
    }

    /**
     * @param string[] $paths
     */
    public static function includeOnce(string ...$paths): void
    {
        foreach ($paths as $path) {
            SplFileIncluder::fromPath($path)->includeOnce();
        }
    }
}
