# AApanel Library Test

[![Maintainer](http://img.shields.io/badge/maintainer-@devopssantana-blue.svg?style=flat-square)](https://twitter.com/devopssantana)
[![Source Code](http://img.shields.io/badge/source-devopssantana/aapanel-blue.svg?style=flat-square)](https://github.com/devopssanatana/aapanel)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/devopssantana/aapanel.svg?style=flat-square)](https://packagist.org/packages/devopssantana/aapanel)
[![Latest Version](https://img.shields.io/github/release/devopssantana/aapanel.svg?style=flat-square)](https://github.com/devopssantana/aapanel/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/devopssantana/aapanel.svg?style=flat-square)](https://scrutinizer-ci.com/g/devopssantana/aapanel)
[![Quality Score](https://img.shields.io/scrutinizer/g/devopssantana/aapanel.svg?style=flat-square)](https://scrutinizer-ci.com/g/devopssantana/aapanel)
[![Total Downloads](https://img.shields.io/packagist/dt/devopssantana/aapanel.svg?style=flat-square)](https://packagist.org/packages/cdevopssantana/aapanel)

## AApanel Library is a small set of classes developed to communicate with AAPanel.

You can know more **[clicking here](https://forum.aapanel.com/d/482-api-interface-tutorial)**.

### Highlights

- Simple installation
- Abstraction of many API methods
- Easy authentication with url and token
- You can manage many resources through your panel and allow your client to manipulate data from their domain account, creating an integrated panel.
- Composer ready and PSR-2 compliant

## Installation

AAPanel is available via Composer:

```bash
"devopssantana/aapanel": "0.0.*"
```

or run

```bash
composer require devopssantana/aapanel
```

## Documentation

##### For details on how to use, see a sample folder in the component directory. In it you will have an example of use for each class. It works like this:

For more details on how to use it, see an example folder in the component's directory. It works like this:

#### Site endpoint:

```php
<?php

require __DIR__ . "/../vendor/autoload.php";


const AAPANEL_SERVER_URL = 'Your Server URL';
const AAPANEL_SERVER_KEY = 'Your Key';  

use DevOpsSantana\AAPanel\AAPanelSite;

//site
$aapanel = new AAPanelSite();

/** List All Sites */
$aapanel->List();

/** Size Site Dir */
$aapanel->Size('yourdomain.com');

/** Anti Xss */
$aapanel->BaseDir('[your site id]', 'yourdomain.com');

/** Get Index  */
$aapanel->GetIndex('[your site id]');

```

#### System endpoint:

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

const AAPANEL_SERVER_URL = 'Your Server URL';
const AAPANEL_SERVER_KEY = 'Your Key';  

use DevOpsSantana\AAPanel\AAPanelSystem;

$aapanel = new AAPanelSystem();

/** Painel Info */
$aapanel->Info(); 

/** Disk Info */
$aapanel->Disk();

/** Network Info  */
$aapanel->Network(); 

/** Size Info  */
$aapanel->Size();
```

## Others

###### You also have classes for the endpoints of many panel features, practical examples are available in the examples folder of this library. Please consult there.

## Contributing

Please see [CONTRIBUTING](https://github.com/devopssantana/aapanel/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email rogeriossilva1@gmail.com instead of using the issue tracker.

Thank you

## Credits

- [Rogério Santana](https://github.com/devopssantana) (Developer)
- [All Contributors](https://github.com/devopssantana/aapanel/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/devopssantana/aapanel/blob/master/LICENSE) for more information.
