<?php

namespace Codepotato\Socialite;

use SocialiteProviders\Manager\SocialiteWasCalled;

class CodepotatoExtendSocialite
{
    /**
     * Execute the provider.
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('codepotato', __NAMESPACE__ . '\CodepotatoSocialiteServiceProvider');
    }
}