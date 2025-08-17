<?php
namespace NetScan;

class IpInfo {
    public function fetch(string $ip): array {
        $json = @file_get_contents("https://ip-api.com/json/" . $ip);
        if ($json) {
            return json_decode($json, true);
        }
        return [];
    }
}
