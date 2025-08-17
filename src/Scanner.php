<?php
namespace NetScan;

class Scanner {
    private array $ports = [21,22,25,53,80,110,143,443,3306,8080];

    public function scan(string $host): array {
        $results = [];
        foreach ($this->ports as $port) {
            $connection = @fsockopen($host, $port, $errno, $errstr, 1);
            if ($connection) {
                fclose($connection);
                $results[$port] = 'open';
            } else {
                $results[$port] = 'closed';
            }
        }
        return $results;
    }
}
