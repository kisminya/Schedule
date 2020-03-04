<?php

namespace App\Http\Controllers;
//little php 7.0 :)
use App\{Program, Channel, Date};
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class ScheduleController extends Controller
{
    public function index(Request $request)
    {  
        $channels = Channel::all();
        $dates = Date::orderBy('date_from')->get();
        $programs = Program::with('channel', 'date')->where('channel_id', 1)->where('date_id',1)->get();
        //Szűrés dátummra
        if(isset($request->date)){
            $programs = Program::with('channel', 'date')->where('date_id', $request->date)->where('channel_id', 1)->get();
        }
        //Szűrés csatornára
        if(isset($request->channel)){
            $programs = Program::with('channel', 'date')->where('date_id', 1)->where('channel_id', $request->channel)->get();
        }
        //Szűrés csatornára és dátummra
        if(isset($request->channel, $request->date)){
            $programs = Program::with('channel', 'date')->where('date_id', $request->date)->where('channel_id', $request->channel)->get();
        }
        return view('schedule', compact('channels', 'dates', 'programs'));
    }
}
