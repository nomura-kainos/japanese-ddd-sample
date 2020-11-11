<?php

declare(strict_types=1);

namespace 認証\インフラ\ドライバ\追加SNS;

use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\SocialiteServiceProvider;

class Amazonサービスプロバイダ extends SocialiteServiceProvider
{
    public function boot()
    {
        Socialite::extend('amazon', function ($app) {
            $config = $this->app['config']['services.amazon'];

            return Socialite::buildProvider(Amazonプロバイダ::class, $config);
        });
    }
}
