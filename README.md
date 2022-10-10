# ProductTrap Skeleton Driver

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-github-actions]][link-github-actions]
[![Static Analysis][ico-static-analysis]][link-static-analysis]
[![Total Downloads][ico-downloads]][link-downloads]
[![Buy us a tree][ico-treeware-gifting]][link-treeware-gifting]

A Skeleton driver for ProductTrap

## Install

Via Composer

```shell
composer require producttrap/driver-skeleton
```

## Usage

```php
use ProductTrap\ProductTrap;

/** @var ProductTrap $productTrap */
$skeleton = $productTrap->driver('skeleton');

$details = $skeleton->find('ABC123');
echo $details->unitPrice->format(); // $24.56 / 1KG
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```shell
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

We encourage people to come forward with fixes and general improvements. If you fork this repo to provide a fix, please open an issue or PR with reference to your changes. This driver was built off of the documentation provided by skeleton without any real testing, due to being unable to acquire sandbox/test access.

## Security

If you discover any security related issues, please email security@voke.dev instead of using the issue tracker.

## Credits

- [Owen Voke][link-author]
- [Bradie Tilley][link-author2]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Treeware

You're free to use this package, but if it makes it to your production environment you are required to buy the world a tree.

It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to plant trees. If you support this package and contribute to the Treeware forest you’ll be creating employment for local families and restoring wildlife habitats.

You can buy trees [here][link-treeware-gifting].

Read more about Treeware at [treeware.earth][link-treeware].

[ico-version]: https://img.shields.io/packagist/v/producttrap/driver-skeleton.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-github-actions]: https://img.shields.io/github/workflow/status/producttrap/driver-skeleton/Tests.svg?style=flat-square
[ico-static-analysis]: https://img.shields.io/github/workflow/status/producttrap/driver-skeleton/Static%20Analysis.svg?style=flat-square&label=Static%20Analysis
[ico-downloads]: https://img.shields.io/packagist/dt/producttrap/driver-skeleton.svg?style=flat-square
[ico-treeware-gifting]: https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-lightgreen?style=flat-square

[link-packagist]: https://packagist.org/packages/producttrap/driver-skeleton
[link-github-actions]: https://github.com/producttrap/driver-skeleton/actions
[link-static-analysis]: https://github.com/producttrap/driver-skeleton/actions/workflows/static.yml
[link-downloads]: https://packagist.org/packages/producttrap/driver-skeleton
[link-treeware]: https://treeware.earth
[link-treeware-gifting]: https://ecologi.com/owenvoke?gift-trees
[link-author]: https://github.com/owenvoke
[link-author2]: https://github.com/bradietilley
[link-contributors]: ../../contributors