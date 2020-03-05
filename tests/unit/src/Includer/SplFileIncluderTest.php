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

namespace Tests\Shrikeh\File\Includer;

use PHPUnit\Framework\TestCase;
use Shrikeh\File\Includer\SplFileIncluder;
use Tests\Shrikeh\Constants;

final class SplFileIncluderTest extends TestCase
{
    public function testItIncludesAFile(): void
    {
        $require = Constants::fixturesDir() . '/require.php';

        $file = SplFileIncluder::fromPath($require);

        $expected = include $require;

        $this->assertSame($expected, $file->include());
    }

    public function testItIncludesOnlyOnce(): void
    {
        $this->assertFalse(class_exists('Bar'));

        $requireOnce = Constants::fixturesDir() . '/include_once.php';
        $file = SplFileIncluder::fromPath($requireOnce);
        $file->includeOnce();

        $this->assertTrue(class_exists('Bar'));
    }
}
