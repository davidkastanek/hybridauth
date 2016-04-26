# David\HybridAuth
[hybridauth/hybridauth](https://github.com/hybridauth/hybridauth) integration into Nette Framework.

## Installation

The best way to install David\HybridAuth is via [Composer](http://getcomposer.org/):
```
$ composer require david/hybridauth
```
## Configuration
Shown below is the example configuration.
```
# config.neon
extensions:
    hybridAuth: David\HybridAuth\DI\HybridAuthExtension

hybridAuth:
    base_url: https://myapp.com/auth/process
    providers:
        Google:
            enabled: true
            keys:
                id: [your-google-key]
                secret: [your-google-secret]
```