<?php

namespace dokuwiki\plugin\oauthzauth;

use dokuwiki\plugin\oauth\Service\AbstractOAuth2Base;
use OAuth\Common\Http\Uri\Uri;

/**
 * Custom Service for Zauth
 */
class Zauth extends AbstractOAuth2Base
{

    /** @inheritdoc */
    public function getAuthorizationEndpoint()
    {
        $plugin = plugin_load('action', 'oauthzauth');
        return new Uri($plugin->getConf('baseurl') . '/oauth/oauth2/authorize/');
    }

    /** @inheritdoc */
    public function getAccessTokenEndpoint()
    {
        $plugin = plugin_load('action', 'oauthzauth');
        return new Uri($plugin->getConf('baseurl') . '/oauth/oauth2/token/');
    }

    /**
     * @inheritdoc
     */
    protected function getAuthorizationMethod()
    {
        return static::AUTHORIZATION_METHOD_HEADER_BEARER;
    }
}
