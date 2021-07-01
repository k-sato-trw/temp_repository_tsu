<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetDateTextController extends Controller
{

    public function datetime(Request $request)
    {
        $datetime_text = $request->input('datetime');
        $target_date = date("Y年n月j日",strtotime($datetime_text));
        $target_week = date("w",strtotime($datetime_text));
        $target_time = date("H:i",strtotime($datetime_text));

        $week = ['日','月','火','水','木','金','土'];


        return $target_date.'('.$week[$target_week].')'.$target_time;
    }

    public function date(Request $request)
    {
        $datetime_text = $request->input('date');
        $target_date = date("Y年n月j日",strtotime($datetime_text));
        $target_week = date("w",strtotime($datetime_text));

        $week = ['日','月','火','水','木','金','土'];


        return $target_date.'('.$week[$target_week].')';
    }

}