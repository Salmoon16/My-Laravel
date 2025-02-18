<?php

namespace App\Services;

use GuzzleHttp\Client;

class PrayerService {
    protected $client;
    protected $baseUrl = 'https://api.myquran.com/v2/sholat';

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function getCityId($cityName) {
        $response = $this->client->get($this->baseUrl . "/kota/cari/{$cityName}");
        $data = json_decode($response->getBody()->getContents(), true);

        if ($data['status'] && !empty($data['data'])) {
            return $data['data'][0]['id'];
        }
        return null;
    }

    public function getPrayerTimes($cityId, $date)
    {
        $response = $this->client->get($this->baseUrl . "/jadwal/{$cityId}/{$date}");
        return json_decode($response->getBody()->getContents(), true);
    }
}
