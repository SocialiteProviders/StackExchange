# StackExchange OAuth2 Provider for Laravel Socialite

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
## Contents

- [Installation](#installation)
  - [1. Composer](#1-composer)
  - [2. Service Provider](#2-service-provider)
  - [3. Add the Event and Listeners](#3-add-the-event-and-listeners)
  - [4. Services Array and .env](#4-services-array-and-env)
    - [Add to `config/services.php`.](#add-to-configservicesphp)
    - [Append provider values to your `.env` file](#append-provider-values-to-your-env-file)
- [Usage](#usage)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->


## Installation

### 1. Composer

```bash
// This assumes that you have composer installed globally
composer require socialiteproviders/stackexchange
```

### 2. Service Provider

* [See the docs on how to install the `SocialiteProviders` service provider.](https://github.com/SocialiteProviders/Manager#2-service-provider)


### 3. Add the Event and Listeners

* The listener that you will be adding is `'SocialiteProviders\StackExchange\StackExchangeExtendSocialite@handle',`. 

* [See the docs on how to install](https://github.com/SocialiteProviders/Manager#3-add-the-event-and-listeners)

### 4. Services Array and .env

#### Add to `config/services.php`.  
 
```php
    'stackexchange' => [
        'client_id' => env('STACKEXCHANGE_CLIENT_ID'),
        'client_secret' => env('STACKEXCHANGE_SECRET'),
        'redirect' => env('STACKEXCHANGE_REDIRECT_URI'),
        'key' => env('STACKEXCHANGE_KEY'),
        'site' => env('STACKEXCHANGE_SITE'),
    ],
```

#### Append provider values to your `.env` file

```php
// other values above
STACKEXCHANGE_KEY=yourkeyfortheservice
STACKEXCHANGE_CLIENT_ID=1234
STACKEXCHANGE_SECRET=yoursecretfortheservice
STACKEXCHANGE_REDIRECT_URI=https://example.com/login/
STACKEXCHANGE_SITE=stackoverflow
```

* [See the main docs for more information](https://github.com/SocialiteProviders/Manager#4-services-array-and-env)
* To figure out the string for `site`, you can visit [this link](https://api.stackexchange.com/docs/sites), click on run, and then look for the `api_site_parameter` field
* **You must have a trailing slash* when passing and setting the `redirect_uri`.

## Usage

* You should now be able to use it like you would regularly use Socialite:

```php
return Socialite::with('stackexchange')->redirect();
```

* [See the main docs for more information](https://github.com/SocialiteProviders/Manager#usage)
