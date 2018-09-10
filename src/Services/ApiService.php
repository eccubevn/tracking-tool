<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 9/10/2018
 * Time: 4:36 PM
 */
namespace App\Services;

class ApiService
{
    const
        GET_PRs = 'https://api.github.com/repos/EC-CUBE/ec-cube/pulls';

    /**
     * @var object ApiService
     */
    protected static $_instance;

    public function init()
    {
    }

    /**
     * @param bool $refresh
     *
     * @return ApiService|object
     */
    public static function getInstance($refresh = false)
    {
        if ($refresh || !(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function call($url)
    {
        $ch = curl_init();

        // Basic Authentication with token
        // https://developer.github.com/v3/auth/
        // https://github.com/blog/1509-personal-api-tokens
        // https://github.com/settings/tokens
        $access = 'username:token';

        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Agent smith');
        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_USERPWD, $access);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        $result = json_decode(trim($output), true);
        return $result;
    }
}