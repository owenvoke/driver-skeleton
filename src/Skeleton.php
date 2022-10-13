<?php

declare(strict_types=1);

namespace ProductTrap\Skeleton;

use Illuminate\Contracts\Cache\Repository as CacheRepository;
use ProductTrap\Contracts\Driver;
use ProductTrap\DTOs\Brand;
use ProductTrap\DTOs\Price;
use ProductTrap\DTOs\Product;
use ProductTrap\DTOs\UnitAmount;
use ProductTrap\DTOs\UnitPrice;
use ProductTrap\Enums\Currency;
use ProductTrap\Enums\Status;
use ProductTrap\Exceptions\ProductTrapDriverException;
use ProductTrap\Traits\DriverCache;
use ProductTrap\Traits\DriverCrawler;

class Skeleton implements Driver
{
    use DriverCache;
    use DriverCrawler;

    public const IDENTIFIER = 'skeleton';

    public const BASE_URI = 'https://skeleton.com';

    public function __construct(CacheRepository $cache)
    {
        $this->cache = $cache;
    }

    public function getName(): string
    {
        return static::IDENTIFIER;
    }

    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws ProductTrapDriverException
     */
    public function find(string $identifier, array $parameters = []): Product
    {
        // $html = $this->remember($identifier, now()->addDay(), fn () => $this->scrape($this->url($identifier)));
        // $crawler = $this->crawl($html);

        return new Product(
            identifier: $identifier,
            sku: $identifier,
            name: 'Party Rings',
            description: 'Rings for the party...',
            url: $this->url($identifier),
            price: $price = new Price(amount: 0.10, currency: Currency::USD),
            status: Status::Available,
            brand: new Brand(identifier: 'Good Brand', name: 'Good Brand'),
            unitAmount: $unitAmount = UnitAmount::parse('10kg'),
            unitPrice: UnitPrice::determine(price: $price, unitAmount: $unitAmount),
            ingredients: 'Partieeessss...',
            images: [],
            raw: [
                'html' => '', // ...
            ],
        );
    }

    public function url(string $identifier): string
    {
        return sprintf('%s/product/%s', self::BASE_URI, $identifier);
    }
}
