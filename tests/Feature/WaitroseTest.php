<?php

declare(strict_types=1);

use ProductTrap\Contracts\Factory;
use ProductTrap\DTOs\Product;
use ProductTrap\Enums\Status;
use ProductTrap\Facades\ProductTrap as FacadesProductTrap;
use ProductTrap\ProductTrap;
use ProductTrap\skeleton\Skeleton;
use ProductTrap\Spider;

function getMockSkeleton($app, string $response): void
{
    Spider::fake([
        '*' => $response,
    ]);
}

it('can add the Skeleton driver to ProductTrap', function () {
    /** @var ProductTrap $client */
    $client = $this->app->make(Factory::class);

    $client->extend('skeleton_other', fn () => new Skeleton(
        cache: $this->app->make('cache.store'),
    ));

    expect($client)->driver(Skeleton::IDENTIFIER)->toBeInstanceOf(Skeleton::class)
        ->and($client)->driver('skeleton_other')->toBeInstanceOf(Skeleton::class);
});

it('can call the ProductTrap facade', function () {
    expect(FacadesProductTrap::driver(Skeleton::IDENTIFIER)->getName())->toBe(Skeleton::IDENTIFIER);
});

it('can retrieve the Skeleton driver from ProductTrap', function () {
    expect($this->app->make(Factory::class)->driver(Skeleton::IDENTIFIER))->toBeInstanceOf(Skeleton::class);
});

it('can call `find` on the skeleton driver and handle a successful response', function () {
    getMockSkeleton($this->app, '/** ADD MOCK CONTENT RESPONSE */');

    $data = $this->app->make(Factory::class)->driver(Skeleton::IDENTIFIER)->find('ABC123');
    unset($data->raw);

    expect($this->app->make(Factory::class)->driver(Skeleton::IDENTIFIER)->find('ABC123'))
        ->toBeInstanceOf(Product::class)
        ->identifier->toBe('ABC123')
        ->status->toEqual(Status::Available)
        ->name->toBe('Party Rings');
});
