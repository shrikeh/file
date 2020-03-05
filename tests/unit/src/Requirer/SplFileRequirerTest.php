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

namespace Tests\Shrikeh\File\Requirer;

use PHPUnit\Framework\TestCase;
use Shrikeh\File\File\SplFileRequirer;
use Tests\Shrikeh\Constants;

final class SplFileRequirerTest extends TestCase
{
    public function testItRequiresAFile(): void
    {
        $require = Constants::fixturesDir() . '/require.php';

        $file = SplFileRequirer::fromPath($require);

        $expected = require $require;

        $this->assertSame($expected, $file->require());
    }

    public function testItRequiresOnlyOnce(): void
    {
        $requireOnce = Constants::fixturesDir() . '/require_once.php';
        $file = SplFileRequirer::fromPath($requireOnce);
        $file->requireOnce();

        $this->assertTrue(class_exists('Foo'));
    }
}
