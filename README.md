php sdk for https://ip4.dev/ (ip to geo location database)

usage :
```
composer require gotapi/ip4dev
```

example:

```PHP

$ip4dev = new \Gotapi\Ip4dev\Ip4Dev();
print_r($ip4dev->ipInfo("183.136.216.35"));
print_r($ip4dev->myIp());
```

output:
```
Gotapi\Ip4dev\Ip4DevResponse Object
(
    [ip] => 125.120.106.113
    [continent_code] => AS
    [country] => China
    [latitude] => 30.2994
    [longitude] => 120.1612
    [country_code] => CN
    [country_code3] => CHN
    [tz] => Asia/Shanghai
    [asn] => 4134
    [organization] => Chinanet
    [region] => Zhejiang
    [region_code] => ZJ
    [city] => Hangzhou
)
```