<?php
namespace App;
use DateTime, DateTimeZone;

$dateObj = new DateTime($date, new DateTimeZone('Europe/Budapest'));
$formatted = $dateObj->format('Y-m-d');
 $portdb = new PortDB(new PortApi);
if($portdb->store($formatted)){
    echo "TV műsor tárolva";
}
