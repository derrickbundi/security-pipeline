<?php
// Download and install the GeoIP2 PHP library
use GeoIp2\Database\Reader;

// Add GeoIP2 database file obtained from provider such as MaxMind 
$mmdb = 'path/to/GeoIP2-Country.mmdb';
$reader = new Reader($mmdb);

// IP to check
$IP = null;

// Get country code from IP address
function CountryCode($IP, $reader) {
    $record = $reader->country($IP);
    return $record->country->isoCode;
}

// Allowed countries
$countries_allowed = ['KE','UG'];

// IP country code
$IP_country_code = CountryCode($IP,$reader);

if(!in_array($IP_country_code, $countries_allowed)) {
    echo "Access denied!";
    exit;
}

echo "Continue";
