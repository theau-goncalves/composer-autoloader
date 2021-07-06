<?php


namespace App\Api;


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SpaceXApi
{
    private HttpClientInterface $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    public function getCrewList(): ?array
    {
        try {
            $response = $this->client->request(
                'GET',
                'https://api.spacexdata.com/v4/crew'
            );

            return $response->toArray();
        } catch (TransportExceptionInterface $e) {
            return null;
        }
    }

    public function getCrewMember(string $memberId): ?array
    {
        try {
            $response = $this->client->request(
                'GET',
                'https://api.spacexdata.com/v4/crew/'.$memberId
            );

            return $response->toArray();
        } catch (TransportExceptionInterface $e) {
            return null;
        }
    }
    public function getLaunch(string $launchId): ?array
    {
        try {
            $response = $this->client->request(
                'GET',
                'https://api.spacexdata.com/v4/launches/' . $launchId
            );

            return $response->toArray();
        } catch (TransportExceptionInterface $e) {
            return null;
        }
    }
}