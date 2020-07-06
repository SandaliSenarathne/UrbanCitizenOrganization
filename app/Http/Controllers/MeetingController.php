<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function createAndJoin(Request $request){

        $user = $request->user;
        $meetingID = $request->meetingName;
        $meetingName = $request->meetingName;
        $description = $request->description;
        $moderator_password = $request->moderatorPwd;
        $attendee_password = 'attendee_pwd';
        $recording = $request->recording;


        echo ($user.' '.$meetingID.' '.$meetingName.' '.$description.' '.$moderator_password.
        ' '.$attendee_password.' '.$recording);

    }

    public function schedule(Request $request){

        $user = $request->user;
        $meetingID = $request->meetingName;
        $meetingName = $request->meetingName;
        $description = $request->description;
        $date = $request->date;
        $time = $request->time;
        $moderator_password = $request->moderatorPwd;
        $attendee_password = 'attendee_pwd';
        $recording = $request->recording;
        $calendar = $request->calendar;


        echo ($user.' '.$meetingID.' '.$meetingName.' '.$description.' '.$date.' '.$time.' '.$moderator_password.
        ' '.$attendee_password.' '.$recording.' '.$calendar);

    }
}
