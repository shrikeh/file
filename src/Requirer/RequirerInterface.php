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

namespace Shrikeh\File\Requirer;

interface RequirerInterface
{
    /**
     * @param bool $wrap Whether to wrap this in a Closure to ensure it has no affect
     * @return mixed
     */
    public function require(bool $wrap = true);

    /**
     * Require the file once.
     */
    public function requireOnce(): void;
}
