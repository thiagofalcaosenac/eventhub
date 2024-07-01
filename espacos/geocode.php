<?php
if (isset($_GET['address'])) {
    $address = urlencode($_GET['address']);
    $accessToken = 'pk.eyJ1IjoicG9ueml0b3MiLCJhIjoiY2x4eXR6ZTI3MDR0NDJrbzYxMXpvcjhrMyJ9.S9nQmSkK94MDXpWQkCW7qw';
    $url = "https://api.mapbox.com/geocoding/v5/mapbox.places/$address.json?access_token=$accessToken";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
}
?>
