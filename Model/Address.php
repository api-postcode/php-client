<?php
/*
* (c) Api Postcode <info@api-postcode.nl>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace ApiPostcode\Model;

/**
 * Class Address
 *
 * @author Api Postcode <info@api-postcode.nl>
 */
class Address
{
    /** @var string */
    private $street;

    /** @var string */
    private $zipCode;

    /** @var string */
    private $houseNumber;

    /** @var string */
    private $city;

    /** @var string */
    private $latitude;

    /** @var string */
    private $longitude;

    /**
     * @param string $street
     * @param string $zipCode
     * @param string $houseNumber
     * @param string $city
     */
    public function __construct($street, $zipCode, $houseNumber, $city)
    {
        $this->street      = $street;
        $this->zipcode     = $zipCode;
        $this->houseNumber = $houseNumber;
        $this->city        = $city;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @return string
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'street'       => $this->street,
            'city'         => $this->city,
            'house_number' => $this->houseNumber,
            'zip_code'     => $this->zipCode,
            'longitude'    => $this->longitude,
            'latitude'     => $this->latitude,   
        );
    }
}
