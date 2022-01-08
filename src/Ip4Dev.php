<?php

namespace Gotapi\Ip4dev;

use GuzzleHttp\Client;

const IP4_DEV_VERSION = "1.0.0";
const IP4_PREFIX = "https://ip4.dev/";
class Ip4Dev
{


    /**
     * @var $client Client
     */
    private $client;

    public function __construct($options = [])
    {
        if (!isset($options["timeout"])) {
            $options["timeout"] = 2.0;
        }
        if (!isset($options)) {
            $options["headers"] = [];
        }
        if (!isset($options["headers"]["X-From-Ip4Dev-Version"])) {
            $options["headers"]["X-From-Ip4Dev-Version"] = IP4_DEV_VERSION;
        }
        $this->client = new Client($options);
    }

    public function myIp(){
        $location = IP4_PREFIX ."myip/";
        $resp = $this->client->get($location);
        return $resp->getBody()->getContents();
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function ipInfo($ip)
    {
        $location = IP4_PREFIX ."location/". $ip;

        $resp = $this->client->get($location);
        if ($resp->getStatusCode() != 200) {
            throw new \Exception("ip4.dev return status rather than 200:" . $resp->getStatusCode());
        }
        $body = $resp->getBody();
        $res = json_decode($body->getContents(), true);
        $ip4devResponse = new Ip4DevResponse();
        $ip4devResponse->ip = $res["ip"];
        $ip4devResponse->city = $res["city"];
        $ip4devResponse->region_code = $res["region_code"];
        $ip4devResponse->region = $res["region"];
        $ip4devResponse->organization = $res["organization"];
        $ip4devResponse->asn = $res["asn"];
        $ip4devResponse->tz = $res["tz"];
        $ip4devResponse->latitude = $res["latitude"];
        $ip4devResponse->longitude = $res["longitude"];
        $ip4devResponse->country = $res["country"];
        $ip4devResponse->country_code = $res["country_code"];
        $ip4devResponse->country_code3 = $res["country_code3"];
        $ip4devResponse->continent_code = $res["continent_code"];
        return $ip4devResponse;
    }

}