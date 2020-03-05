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

namespace Shrikeh\File\Traits;

use SplFileInfo;

trait SplFileInfoTrait
{
    /**
     * @var SplFileInfo
     */
    private SplFileInfo $file;

    /**
     * @param string $path
     * @return static
     */
    public static function fromPath(string $path): self
    {
        return new self(new SplFileInfo($path));
    }

    /**
     * SplFileRequirer constructor.
     * @param SplFileInfo $file
     */
    public function __construct(SplFileInfo $file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    private function getPath(): string
    {
        return $this->file->getPathname();
    }
}
