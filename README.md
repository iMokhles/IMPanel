# IMPanel

[![Build Status](https://travis-ci.org/iMokhles/IMPanel.svg?branch=master)](https://travis-ci.org/iMokhles/IMPanel)

my personal BackPack Setup with MultiAuthCommand to generate MultiAuth Guards ( Admin + User )

## Install

1) Run in your terminal:

``` bash
$ git clone https://github.com/iMokhles/IMPanel.git IMPanel
```

2) Set your database information in your .env file (use the .env.example as an example);

3) Run in your IMPanel folder:
``` bash
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate:refresh --seed --force
```

## Security

If you discover any security related issues, please email imokhles@imokhles.com instead of using the issue tracker.

## Credits

- [iMokhles](http://github.com/imokhles)

## License

The GPL v3 License (GNU GENERAL PUBLIC LICENSE Version 3). Please see [License File](LICENSE.md) for more information.

[![Beerpay](https://beerpay.io/iMokhles/IMPanel/badge.svg?style=beer-square)](https://beerpay.io/iMokhles/IMPanel)  [![Beerpay](https://beerpay.io/iMokhles/IMPanel/make-wish.svg?style=flat-square)](https://beerpay.io/iMokhles/IMPanel?focus=wish)
