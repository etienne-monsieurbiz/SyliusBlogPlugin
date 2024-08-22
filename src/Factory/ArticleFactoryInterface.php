<?php

/*
 * This file is part of Monsieur Biz's Blog plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusBlogPlugin\Factory;

use MonsieurBiz\SyliusBlogPlugin\Entity\ArticleInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

/**
 * @template T of ArticleInterface
 *
 * @extends FactoryInterface<T>
 */
interface ArticleFactoryInterface extends FactoryInterface
{
    public function createNewWithType(string $type): ArticleInterface;
}