Api Postcode PHP Client
=======================

A PHP client for fetching address detials from https://api-postcode.nl

Installation
------------
Installation is a quick step process:

1. Download the client with composer

### Step 1: Download php-client using composer

``` bash
$ composer require api-postcode/php-client
```


Usage
-----
``` php
$token = 'secret-token';
$client = new ApiPostcode\Client\PostcodeClient($token);

$address = $client->fetchAddress('1082MD', 34);

$address->getStreet();      // Claude Debussylaan
$address->getCity();        // Amsterdam
$address->getHouseNumber(); // 34
$address->getZipCode();     // 1082MD
$address->getLatitude();    // 52.3377074
$address->getLongitude();   // 4.8719565
```
