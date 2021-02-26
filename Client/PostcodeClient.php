<?php
/*
* (c) Api Postcode <info@api-postcode.nl>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace ApiPostcode\Client;

use ApiPostcode\Exception\InvalidPostcodeException;
use ApiPostcode\Exception\InvalidResponseException;
use ApiPostcode\Model\Address;

/**
 * Class PostcodeClient
 *
 * @author Api Postcode <info@api-postcode.nl>
 */
class PostcodeClient
{
    /** @var string */
    private $token;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @param string $zipCode
     * @param string $houseNumber
     *
     * @throws InvalidPostcodeException
     * @throws InvalidResponseException
     *
     * @return Address
     */
    public function fetchAddress($zipCode, $houseNumber)
    {
        if (0 === preg_match('/^[1-9]{1}[0-9]{3}[\s]{0,1}[a-z]{2}$/i', $zipCode)) {
            throw new InvalidPostcodeException('Given postcode incorrect');
        }

        $uri = sprintf("https://json.api-postcode.nl?postcode=%s&number=%s", $zipCode, $houseNumber);
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [sprintf('Token: %s', $this->token)]);

        $serverOutput = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($httpCode !== 200) {
            throw new InvalidResponseException('Response does not return a valid response code');
        }

        curl_close($curl);

        $responseData = json_decode($serverOutput, true);

        $address = new Address(
            $responseData['street'],
            $responseData['postcode'],
            $responseData['house_number'],
            $responseData['city']
        );

        $address->setLatitude($responseData['latitude']);
        $address->setLongitude($responseData['longitude']);
        $address->setProvince($responseData['province']);

        return $address;
    }
}
