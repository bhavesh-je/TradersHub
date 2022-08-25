<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meetings;
use GuzzleHttp\Client;
use DB;
use Hash;
use Illuminate\Support\Arr;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('role:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listmeeings = Meetings::orderBy('id','DESC')->get();
        // dd($listmeeings);
        return view('Backend.LiveStream.index', compact('listmeeings'));
        // return view('meeting.index');
    }

    /**
     * Return Zoom meeting API Access Token
     *
     * @return Access Token
     */
    public function zoomToken(){
        $client_id = env('ZOOM_API_KEY');
        $client_secret = env('ZOOM_API_SECRET');
        $zoomAccountId = env('ZOOM_APP_ACCOUNT_ID');
        $content = "grant_type=client_credentials&client_id=$client_id&client_secret=$client_secret&account_id=$zoomAccountId";
        $accountIdUrlParameter = "?grant_type=account_credentials&account_id=$zoomAccountId";
        $token_url="https://zoom.us/oauth/token".$accountIdUrlParameter;
        $curl = curl_init();
        curl_setopt_array($curl, array(

            CURLOPT_URL =>$token_url,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $content
        ));
        $data = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($data);
        $access_token = $result->access_token;

        return $access_token;
    }

    /**
     * Create zoom meeting and get meeting link
     *
     * @return /
     */
    public function createZoomMeeting(Request $request) {
        $topic = $request->topic;
        $type = $request->type;
        $start_time = $request->start_time;
        $duration = $request->duration;
        $accessToken = $this->zoomToken();
        // $access_token = $this->zoomToken();
        // Create meeting
        $client = new \GuzzleHttp\Client();
        $create_meeting = $client->request('POST', 'https://api.zoom.us/v2/users/me/meetings', [
            "headers" => [
                "Authorization" => 'Bearer '. $accessToken
            ],
            'json' => [
                "topic" => $topic,
                "type" => $type,
                "start_time" => $start_time,
                "duration" => $duration, // 30 mins
            ],
        ]);
        $data = json_decode($create_meeting->getBody());

        // dd($data);
        // $cmcontroller = new LiveStreamController();
        // return $cmcontroller->store($data);
        $this->store($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.LiveStream.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = $request->topic;
        $type = $request->type;
        $start_time = $request->start_time;
        $duration = $request->duration;
      
        // Create meeting
        $client = new \GuzzleHttp\Client();
        $create_meeting = $client->request('POST', 'https://api.zoom.us/v2/users/me/meetings', [
            "headers" => [
                "Authorization" => 'Bearer '. $this->zoomToken()
            ],
            'json' => [
                "topic" => $topic,
                "type" => 2,
                "start_time" => $start_time,
                "duration" => $duration, // 30 mins
            ],
        ]);
        $data = json_decode($create_meeting->getBody());

        $cmeeting = new Meetings();
        $cmeeting->uuid = $data->uuid;
        $cmeeting->m_id = $data->id;
        $cmeeting->start_time = $data->start_time;
        $cmeeting->topic = $data->topic;
        $cmeeting->type = $data->type;
        $cmeeting->join_url = $data->join_url;
        $cmeeting->host_id = $data->host_id;
        $cmeeting->duration = $data->duration;
        $cmeeting->save();

        return redirect()->route('meetings.index')->with('success', 'Meeting has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_meeting = Meetings::where('id',$id)->first();
        return view('Backend.LiveStream.show',['show_meeting'=>$show_meeting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_meeting = Meetings::where('id',$id)->first();
        // dd($edit_meeting);
        return view('Backend.LiveStream.edit',['edit_meeting'=>$edit_meeting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request);
        // $update_id = $request->update_id;
        $update_id = $id;
        $topic = $request->topic;
        $type = $request->type;
        $m_id = $request->m_id;
        $start_time = $request->start_time;
        $duration = (int)$request->duration;
        $access_token = $this->zoomToken();
        $client = new \GuzzleHttp\Client();
        $update_meeting = $client->request('PATCH', 'https://api.zoom.us/v2/meetings/'.$m_id, [
            "headers" => [
                "Authorization" => "Bearer".$access_token
            ],
            'json' => [
                "topic" => $topic,
                "type" => $type,
                "start_time" => $start_time,
                "duration" => $duration
            ],
        ]);

        $data = json_decode($update_meeting->getBody());
        // dd($data);

        $umeeting = Meetings::where('id',$update_id)->first();
        $umeeting->uuid = $request->uuid;
        $umeeting->m_id = $request->m_id;
        $umeeting->start_time = $request->start_time;
        $umeeting->topic = $request->topic;
        $umeeting->type = $request->type;
        $umeeting->join_url = $request->join_url;
        $umeeting->host_id = $request->host_id;
        $umeeting->duration = $request->duration;
        $umeeting->save();

        return redirect()->route('meetings.index')->with('success', 'Meeting has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dmeeting = Meetings::where('id',$id)->firstOrFail();
        $m_id = $dmeeting->m_id;
        echo "<pre>";
        print_r($dmeeting);
        echo "</pre>";
        $access_token = $this->zoomToken();
        $client = new \GuzzleHttp\Client();
        $delete_meeting = $client->request('DELETE', 'https://api.zoom.us/v2/meetings/'.$m_id, [
            "headers" => [
                "Authorization" => "Bearer".$access_token
            ]
        ]);

        $data = json_decode($delete_meeting->getBody());
        $dmeeting->delete();

        return redirect()->route('meetings.index')->with('success', 'Meeting has been deleted successfully.'); 
    }
}
