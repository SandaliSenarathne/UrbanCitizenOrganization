<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;

class MeetingController extends Controller
{
    public function createAndJoin(Request $request){

        $user = $request->user;
        $meetingID = $request->meetingName;
        $meetingName = $request->meetingName;
        $description = $request->description;
        $moderatorPassword = $request->moderatorPwd;
        $attendeePassword = $request->attendeePwd == null ? 'attendee_pwd' : $request->attendeePwd;
        $recording = $request->recording;

        $bbb = new BigBlueButton();

        $createParams = new CreateMeetingParameters($meetingID, $meetingName);
        $createParams = $createParams->setModeratorPassword($moderatorPassword)
                                     ->setAttendeePassword($attendeePassword)
                                     ->setRecord($recording)
                                     ->setAllowStartStopRecording($recording)
                                     ->setAutoStartRecording(false)
                                     ->setLogoutUrl(URL::previous());

        $response = $bbb->createMeeting($createParams);
        if ($response->getReturnCode() == 'FAILED') {
            return 'Can\'t create room! please contact our administrator.';
        } else {
            $joinParams = new JoinMeetingParameters($meetingID, $user, $moderatorPassword);

            // Ask for immediate redirection
            $joinParams->setRedirect(true);
            $url = $bbb->getJoinMeetingURL($joinParams);
            return redirect($url);
        }



    }

    public function schedule(Request $request){

        $user = $request->user;
        $meetingID = $request->meetingName;
        $meetingName = $request->meetingName;
        $description = $request->description;
        $date = $request->date;
        $time = $request->time;
        $moderatorPassword = $request->moderatorPwd;
        $attendeePassword = $request->attendeePwd == null ? 'attendee_pwd' : $request->attendeePwd;
        $recording = $request->recording;
        $calendar = $request->calendar;


        echo ($user.' '.$meetingID.' '.$meetingName.' '.$description.' '.$date.' '.$time.' '.$moderatorPassword.
        ' '.$attendeePassword.' '.$recording.' '.$calendar);

    }

}
