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

interface IncluderInterface
{
    /**
     * @param bool $wrap
     * @return mixed
     */
    public function include(bool $wrap = true);

    /**
     * @return mixed|bool
     */
    public function includeOnce();
}
