<?php

namespace App;

use Illuminate\Support\Facades\DB;

class PortDB
{
    private $api;

    public function __construct(PortApi $api)
    {
        $this->api = $api;
    }
    /**
     * Az adatbázisba tölti az apiról
     * lekért adatokat.
     *@param string $date format: YYYY-MM-DD
     */
    public function store($date)
    {
        $data = $this->api->getData($date);

        $this->insert($data);
    }


    public function insert($data)
    {
        $date = Date::firstOrCreate(
            ['date_from' => $data->date_from],
            ['date_from' => $data->date_from]
        );

        foreach ($data->channels as $channel) {
            $ch = Channel::firstOrCreate(
                ['name' => $channel->name],
                ['name' => $channel->name]
            );

            foreach ($channel->programs as $program) {
                Program::firstOrCreate(
                    [
                        'title' => $program->title,
                        'date_id' => $date->id,
                        'channel_id' => $ch->id,
                    ],
                    [
                        'start_time' => $program->start_time,
                        'title' => $program->title,
                        'description' => $program->short_description,
                        'age_limit' => $program->restriction->age_limit,
                        'channel_id' => $ch->id,
                        'date_id' =>    $date->id
                    ]
                );
            }
        }
    }
}
