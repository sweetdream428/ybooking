<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use Google\Client;
use Google\Service\Calendar;
use Illuminate\Support\Facades\Auth;


class GoogleCalendarController extends Controller
{
    public function getClient(){
        
        $client = new Client();
        $client->setApplicationName('Google Calendar API PHP Quickstart');
        $client->setScopes(Calendar::CALENDAR);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        $authUrl = $client->createAuthUrl();
      
        header("Location:".$authUrl); 
        exit();
        
        return $client;
    }

    public function store(Request $request){

        $client = new Client();
        $client->setApplicationName('Google Calendar API PHP Quickstart');
        $client->setScopes(Calendar::CALENDAR);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = 'token'.Auth::user()->id.'.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {

                print 'Enter verification code: ';
                $authCode = $request->code;
               
                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        // return $client;
        return redirect('/getevents');
    }
    
    public function getevents(){
        if(Auth::user()->setcalendar == 1){
            function getClient()
            {
                
                $client = new Client();
                $client->setApplicationName('Google Calendar API PHP Quickstart');
                $client->setScopes(Calendar::CALENDAR);
                $client->setAuthConfig('credentials.json');
                $client->setAccessType('offline');
                $client->setPrompt('select_account consent');

                // Load previously authorized token from a file, if it exists.
                // The file token.json stores the user's access and refresh tokens, and is
                // created automatically when the authorization flow completes for the first
                // time.
                $tokenPath = 'token'.Auth::user()->id.'.json';
                if (file_exists($tokenPath)) {
                    $accessToken = json_decode(file_get_contents($tokenPath), true);
                    $client->setAccessToken($accessToken);
                }

                // If there is no previous token or it's expired.
                if ($client->isAccessTokenExpired()) {
                    // Refresh the token if possible, else fetch a new one.
                    if ($client->getRefreshToken()) {
                        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                    } else {
                        // Request authorization from the user.
                        $authUrl = $client->createAuthUrl();
                        header("Location:".$authUrl); 
                        exit();
                        $authCode = trim(fgets(STDIN));
                        printf("Open the following link in your browser:\n%s\n", $authCode);
                        // Exchange authorization code for an access token.
                        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                        $client->setAccessToken($accessToken);

                        // Check to see if there was an error.
                        if (array_key_exists('error', $accessToken)) {
                            throw new Exception(join(', ', $accessToken));
                        }
                    }
                    // Save the token to a file.
                    if (!file_exists(dirname($tokenPath))) {
                        mkdir(dirname($tokenPath), 0700, true);
                    }
                    file_put_contents($tokenPath, json_encode($client->getAccessToken()));
                }
                return $client;
            }


            // Get the API client and construct the service object.
            $client = getClient();
            $service = new Calendar($client);

            // Print the next 10 events on the user's calendar.
            $calendarId = 'primary';
            $optParams = array(
            'maxResults' => 100,
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => date('c'),
            );
            $results = $service->events->listEvents($calendarId, $optParams);
            $events = $results->getItems();
            return view('calendar')->with('events', $events);
        }
        else{
            return view('calendar');
        }
    }
	
	 public function setcalendar(Request $request){
        DB::table('users')->where('id', Auth::user()->id)->update([
            'setcalendar' => request('setcalendar')
        ]);
        if(request('setcalendar') == 0){
            unlink('token'.Auth::user()->id.'.json');
        }
        
        return response()->json(['success'=>true]);
        
    }

}