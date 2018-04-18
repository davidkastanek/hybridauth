# Gutter\HybridAuth
This is [hybridauth/hybridauth](https://github.com/hybridauth/hybridauth) integration for Nette Framework.

## Installation

The best way to install Gutter\HybridAuth is via [Composer](http://getcomposer.org/):
```
$ composer require gutter/hybridauth
```
## Usage
You can use the HybridAuth as an extension.
### Configuration
First you have to set the extension up in `config.neon`.
```
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
### Implementation
Then the implementation of `/auth` controller could look like this:
```
class AuthPresenter extends BasePresenter
{
    /** @var \Gutter\HybridAuth\Manager @inject */
    public $hybridAuth;

    /** @var AuthModel @inject */
    public $model;

    public function actionProcess()
    {
        $this->hybridAuth->process();
    }

    public function actionGoogle()
    {
        $adapter = $this->hybridAuth->authenticate('Google');
        $userProfile = $adapter->getUserProfile();

        $user = $this->model->getUserByEmail($userProfile->email);
        if ($user) {
            $this->login($user);
        }

        $this->redirect('Login:failed');
    }

    public function actionFacebook()
    {
        $adapter = $this->hybridAuth->authenticate('Facebook');
        $userProfile = $adapter->getUserProfile();

        $user = $this->model->getUserByEmail($userProfile->email);
        if ($user) {
            $this->login($user);
        }

        $this->redirect('Login:failed');
    }
}
```