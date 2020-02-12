<?php
/*
* (c) Api Postcode <info@api-postcode.nl>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace ApiPostcode\Model;

use JsonSerializable;

/**
 * Class Address
 *
 * @author Api Postcode <info@api-postcode.nl>
 */
class Address implements JsonSerializable
{
    /** @var string */
    private $street;

    /** @var string */
    private $zipCode;

    /** @var string */
    private $houseNumber;

    /** @var string */
    private $city;

    /** @var float */
    private $latitude;

    /** @var float */
    private $longitude;

    /** @var string|null */
    private $province;

    /**
     * @param string $street
     * @param string $zipCode
     * @param string $houseNumber
     * @param string $city
     */
    public function __construct(string $street, string $zipCode, string $houseNumber, string $city)
    {
        $this->street      = $street;
        $this->zipCode     = $zipCode;
        $this->houseNumber = $houseNumber;
        $this->city        = $city;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string|null
     */
    public function getProvince(): ?string
    {
        return $this->province;
    }

    /**
     * @param string|null $province
     */
    public function setProvince(?string $province): void
    {
        $this->province = $province;
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
            'province'     => $this->province,
        );
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
