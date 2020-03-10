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

use DirectoryIterator;
use PHPUnit\Framework\TestCase;
use Shrikeh\File\File;
use SplFileInfo;
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

    public function testRequireOnces(): void
    {
        $requireOnceDir = new DirectoryIterator(Constants::fixturesDir() . '/require_once');

        $requireOncedFiles = [];

        /** @var SplFileInfo $requireOnce */
        foreach ($requireOnceDir as $requireOnce) {
            if (!$requireOnce->isDot()) {
                $requireOncedFiles[] = $requireOnce->getRealPath();
            }
        }

        File::requireOnce(...$requireOncedFiles);

        $this->assertTrue(defined('REQUIRED_ONCE_1'));
        $this->assertTrue(defined('REQUIRED_ONCE_2'));
        $this->assertTrue(defined('REQUIRED_ONCE_3'));
    }
}
