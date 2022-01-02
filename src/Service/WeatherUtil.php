<?php

namespace App\Service;

use App\Entity\Location;
use App\Repository\LocationRepository;
use App\Repository\MeasurmentsRepository;

class WeatherUtil
{
    private $locationRepository;
    private $measurementRepository;

    function __construct(LocationRepository $locationRepository, MeasurmentsRepository $measurementRepository)
    {
        $this->locationRepository = $locationRepository;
        $this->measurementRepository = $measurementRepository;
    }

    /**
     * @param string $country
     * @param string $city
     */
    public function getWeatherForCountryAndCity($country, $city)
    {
        $loc = $this->locationRepository->findByCityAndCountry($country, $city);
        return $this->getWeatherForLocation($loc);
    }

    /**
     * @param Location $location
     */
    public function getWeatherForLocation(Location $location)
    {
        $measurement = $this->measurementRepository->findByLocation($location);
        return $measurement;
    }
}