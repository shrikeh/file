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

namespace Tests\Shrikeh\File;

use PHPUnit\Framework\TestCase;
use Shrikeh\File\File;
use Tests\Shrikeh\Constants;

final class FileTest extends TestCase
{
    public function testItRequires(): void
    {
        $require = Constants::fixturesDir() . '/require.php';
        $contents = File::require($require);
        $expected = require $require;

        $this->assertSame($expected, $contents);
    }

    public function testIIncludes(): void
    {
        $include = Constants::fixturesDir() . '/require.php';
        $contents = File::include($include);
        $expected = include $include;

        $this->assertSame($expected, $contents);
    }
}