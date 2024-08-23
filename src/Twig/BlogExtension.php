<?php

/*
 * This file is part of Monsieur Biz's Blog plugin for Sylius.
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusBlogPlugin\Twig;

use MonsieurBiz\SyliusBlogPlugin\Entity\TagInterface;
use MonsieurBiz\SyliusBlogPlugin\Repository\TagRepositoryInterface;
use Sylius\Component\Locale\Context\LocaleContextInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class BlogExtension extends AbstractExtension
{
    /** @phpstan-ignore-next-line */
    public function __construct(
        private TagRepositoryInterface $tagRepository,
        private LocaleContextInterface $localeContext,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('monsieurbiz_blog_tags', [$this, 'getTags']),
        ];
    }

    /**
     * @return TagInterface[]
     */
    public function getTags(): array
    {
        return $this->tagRepository->createEnabledListQueryBuilder($this->localeContext->getLocaleCode())->getQuery()->getResult();
    }
}
