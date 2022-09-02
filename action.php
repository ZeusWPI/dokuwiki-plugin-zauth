<?php

use dokuwiki\plugin\oauth\Adapter;
use dokuwiki\plugin\oauthzauth\Zauth;

/**
 * Service Implementation for oAuth Zauth authentication
 */
class action_plugin_oauthzauth extends Adapter
{

    /** @inheritdoc */
    public function registerServiceClass()
    {
        return Zauth::class;
    }

    /** * @inheritDoc */
    public function getUser()
    {
        $oauth = $this->getOAuthService();
        $data = array();

        $url = $this->getConf('baseurl') . '/oauth/api/current_user';


        $raw = $oauth->request($url);
        $result = json_decode($raw, true);

        $data['user'] = $result['username'];
        $data['name'] = $result['username'];
        $data['mail'] = $result['username'] . '@zeus.ugent.be';

        return $data;
    }

    /** @inheritDoc */
    public function getLabel()
    {
        return 'Zauth';
    }

    /** @inheritDoc */
    public function getColor()
    {
        return '#ff7f00';
    }

}
