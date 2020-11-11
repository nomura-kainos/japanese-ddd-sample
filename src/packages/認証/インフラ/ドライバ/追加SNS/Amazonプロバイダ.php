<?php

declare(strict_types=1);

namespace 認証\インフラ\ドライバ\追加SNS;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class Amazonプロバイダ extends AbstractProvider implements ProviderInterface
{
    /**
     * ユーザ情報で取得するパラメータを指定する
     * https://developer.amazon.com/ja/docs/login-with-amazon/customer-profile.html
     */
    protected $scopes = ['profile:user_id profile:email'];

    /**
     * パラメータの区切り文字を指定する
     */
    protected $scopeSeparator = ' ';

    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        $url = 'https://www.amazon.com/ap/oa';

        return $this->buildAuthUrlFromBase($url, $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return 'https://api.amazon.com/auth/o2/token';
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenFields($code)
    {
        return parent::getTokenFields($code) + ['grant_type' => 'authorization_code'];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()
            ->get('https://api.amazon.com/user/profile', [
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                ],
            ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id'       => $user['user_id'],
            'nickname' => $user['name'] ?? '',
            'name'     => $user['name'] ?? '',
            'email'    => $user['email'] ?? '',
            'avatar'   => '',
        ]);
    }
}
