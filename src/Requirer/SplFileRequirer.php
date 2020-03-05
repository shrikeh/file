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

namespace Shrikeh\File\File;

use Closure;
use Shrikeh\File\Requirer\RequirerInterface;
use Shrikeh\File\Traits\SplFileInfoTrait;

final class SplFileRequirer implements RequirerInterface
{
    use SplFileInfoTrait;

    /**
     * @inheritDoc
     * @psalm-suppress UnresolvableInclude
     */
    public function require(bool $wrap = true)
    {
        $path = $this->getPath();

        return $wrap ? $this->wrap($path) : require $path;
    }

    /**
     * {@inheritdoc}
     * @psalm-suppress UnresolvableInclude
     */
    public function requireOnce(): void
    {
        require_once $this->getPath();
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
            return require $path;
        };

        return $wrapped();
    }
}
