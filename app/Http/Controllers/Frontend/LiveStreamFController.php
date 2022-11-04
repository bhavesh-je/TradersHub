<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LiveStreamFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $upcoming_meeting = $client->request('GET', 'https://api.zoom.us/v2/users/report/upcoming_events', [
            "headers" => [
                "Authorization" => 'Bearer '. $this->zoomToken(),
            ],
            'json' => [
                'from' => '2022-09-01',
                'to' => '2022-09-23',
                "page_size" => 30,
                "next_page_token" => "b43YBRLJFg3V4vsSpxvGdKIGtNbxn9h9If2",
            ],
        ]);
        $data = json_decode($upcoming_meeting->getBody());
        // dd($upcoming_meeting->getBody());
        // dd($this->zoomToken());
        return Inertia::render('LiveStream',['upcoming_meetings'=>$data]);
    }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
