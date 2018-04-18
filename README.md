# Gutter\HybridAuth
This is [hybridauth/hybridauth](https://github.com/hybridauth/hybridauth) integration for Nette Framework.

## Installation

The best way to install Gutter\HybridAuth is via [Composer](http://getcomposer.org/):
```
$ composer require gutter/hybridauth
```
## Usage
You can use the HybridAuth as an extension.
```
# config.neon
extensions:
    hybridAuth: Gutter\HybridAuth\DI\HybridAuthExtension

hybridAuth:
    base_url: https://myapp.com/auth/process
    providers:
        Google:
            enabled: true
            keys:
                id: [your-google-key]
                secret: [your-google-secret]
        Facebook:
            enabled: true
            keys:
                id: [your-facebook-key]
                secret: [your-facebook-secret]
            scope: email
```