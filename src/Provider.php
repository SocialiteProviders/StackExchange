<?php
namespace SocialiteProviders\StackExchange;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

/**
 * https://api.stackexchange.com/docs/authentication
 * Class Provider
 * @package SocialiteProviders\StackExchange
 */
class Provider extends AbstractProvider implements ProviderInterface {

    protected $version = '2.2';

    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://stackexchange.com/oauth', $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return 'https://stackexchange.com/oauth/access_token';
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {
        // https://api.stackexchange.com/docs/me
        $response = $this->getHttpClient()->get(
            'https://api.stackexchange.com/' . $this->version . '/me?access_token=' . $token,
            [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]
        );

        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id' => $user['items']['user_id'],
            'nickname' => $user['items']['display_name'],
            'name' => $user['items']['display_name'],
            'avatar' => $user['items']['profile_image'],
        ]);
    }
}
