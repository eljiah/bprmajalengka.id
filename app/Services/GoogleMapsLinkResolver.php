<?php

namespace App\Services;

use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriResolver;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;
use RuntimeException;

class GoogleMapsLinkResolver
{
    private const ALLOWED_HOSTS = [
        'goo.gl',
        'maps.app.goo.gl',
        'google.com',
        'www.google.com',
        'maps.google.com',
        'google.co.id',
        'www.google.co.id',
        'maps.google.co.id',
    ];

    /**
     * @return array{latitude: string, longitude: string}
     */
    public function resolve(string $url): array
    {
        $currentUrl = $url;
        $this->assertAllowedUrl($currentUrl);

        try {
            for ($redirects = 0; $redirects <= 5; $redirects++) {
                $response = Http::withOptions(['allow_redirects' => false])
                    ->connectTimeout(3)
                    ->timeout(8)
                    ->withUserAgent('BankMajalengka/1.0 GoogleMapsLinkResolver')
                    ->get($currentUrl);

                if ($response->status() >= 300 && $response->status() < 400) {
                    $location = $response->header('Location');
                    if (!$location || $redirects === 5) {
                        throw new RuntimeException('Tautan Google Maps terlalu banyak pengalihan atau tidak memiliki tujuan.');
                    }

                    try {
                        $currentUrl = (string) UriResolver::resolve(new Uri($currentUrl), new Uri($location));
                    } catch (InvalidArgumentException $exception) {
                        throw new RuntimeException('Tujuan pengalihan tautan Google Maps tidak valid.', previous: $exception);
                    }
                    $this->assertAllowedUrl($currentUrl);
                    continue;
                }

                if (!$response->successful()) {
                    throw new RuntimeException('Tautan Google Maps tidak dapat dibuka.');
                }

                $coordinates = $this->extractCoordinates($currentUrl);
                if ($coordinates !== null) {
                    return $coordinates;
                }

                throw new RuntimeException('Koordinat tidak ditemukan pada tautan Google Maps. Pastikan tautan mengarah ke pin lokasi.');
            }
        } catch (ConnectionException $exception) {
            throw new RuntimeException('Tautan Google Maps gagal diakses. Coba lagi atau masukkan koordinat secara manual.', previous: $exception);
        }

        throw new RuntimeException('Tautan Google Maps tidak dapat diproses.');
    }

    private function assertAllowedUrl(string $url): void
    {
        $parts = parse_url($url);
        $host = strtolower($parts['host'] ?? '');

        if (($parts['scheme'] ?? '') !== 'https'
            || isset($parts['user'])
            || isset($parts['pass'])
            || (isset($parts['port']) && $parts['port'] !== 443)
            || !in_array($host, self::ALLOWED_HOSTS, true)) {
            throw new RuntimeException('Gunakan tautan HTTPS Google Maps atau maps.app.goo.gl.');
        }
    }

    /**
     * @return array{latitude: string, longitude: string}|null
     */
    private function extractCoordinates(string $url): ?array
    {
        $parts = parse_url($url);
        parse_str($parts['query'] ?? '', $query);

        foreach (['query', 'q', 'll', 'center', 'destination', 'daddr'] as $key) {
            if (isset($query[$key]) && is_string($query[$key])) {
                $coordinates = $this->parseCoordinatePair($query[$key]);
                if ($coordinates !== null) {
                    return $coordinates;
                }
            }
        }

        $patterns = [
            '/@(-?\d{1,3}(?:\.\d+)?),(-?\d{1,3}(?:\.\d+)?)/',
            '/!3d(-?\d{1,3}(?:\.\d+)?)!4d(-?\d{1,3}(?:\.\d+)?)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                $coordinates = $this->validateCoordinates($matches[1], $matches[2]);
                if ($coordinates !== null) {
                    return $coordinates;
                }
            }
        }

        return null;
    }

    /**
     * @return array{latitude: string, longitude: string}|null
     */
    private function parseCoordinatePair(string $value): ?array
    {
        if (!preg_match('/^\s*(-?\d{1,3}(?:\.\d+)?)\s*,\s*(-?\d{1,3}(?:\.\d+)?)\s*$/', $value, $matches)) {
            return null;
        }

        return $this->validateCoordinates($matches[1], $matches[2]);
    }

    /**
     * @return array{latitude: string, longitude: string}|null
     */
    private function validateCoordinates(string $latitude, string $longitude): ?array
    {
        if (!is_numeric($latitude) || !is_numeric($longitude)
            || (float) $latitude < -90 || (float) $latitude > 90
            || (float) $longitude < -180 || (float) $longitude > 180) {
            return null;
        }

        return ['latitude' => $latitude, 'longitude' => $longitude];
    }
}
