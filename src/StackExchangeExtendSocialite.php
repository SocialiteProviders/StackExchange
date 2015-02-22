<?php
namespace SocialiteProviders\StackExchange;

use SocialiteProviders\Manager\SocialiteWasCalled;

class StackExchangeExtendSocialite
{
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('stackexchange', __NAMESPACE__.'\Provider');
    }
}
