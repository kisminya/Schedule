<?php
namespace App;

class PortApi {
    /**
    * Lekéri az adatot az API-ról
    *@param string $date
    */

    public function getData($date) 
    {   
        $url = "https://port.hu/tvapi?channel_id%5B%5D=tvchannel-5&channel_id%5B%5D=tvchannel-3&channel_id%5B%5D=tvchannel-21&channel_id%5B%5D=tvchannel-6&channel_id%5B%5D=tvchannel-103&date=$date";
        $data = json_decode(file_get_contents($url));
        return $data;
    }

}