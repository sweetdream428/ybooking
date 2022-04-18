<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use App\Models\DatatransOrder;
use Illuminate\Support\Facades\Auth;
use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;

class DatatransOrderController extends Controller
{

    public function index(){
        if(Auth::user()->is_superuser == 1){
            $orders = DB::table('datatrans_orders')->get();
            $services = DB::table('datatrans_services')->get();
            $categories = DB::table('datatrans_categories')->get();
            $locations = DB::table('users')->where('is_superuser', '3')->get();
            $employees = DB::table('users')->where('is_superuser', '4')->get();
            return view('datatransorder')->with('orders', $orders)->with('services', $services)->with('categories', $categories)->with('employees', $employees)->with('locations', $locations);
        }

        else{
            $orders = DB::table('datatrans_orders')->where('own_id', Auth::user()->id)->get();
            $services = DB::table('datatrans_services')->where('own_id', Auth::user()->id)->get();
            $categories = DB::table('datatrans_categories')->where('own_id', Auth::user()->id)->get();
            $locations = DB::table('users')->where('is_superuser', '3')->where('own_id', Auth::user()->id)->get();
            $employees = DB::table('users')->where('is_superuser', '4')->where('own_id', Auth::user()->id)->get();
            return view('datatransorder')->with('orders', $orders)->with('services', $services)->with('categories', $categories)->with('employees', $employees)->with('locations', $locations);
        }
        
    }

    public function create(Request $request){
        try{
            $Order = new DatatransOrder;
            $Order->service_name = request('service_name');
            $Order->category_name = request('category_name');
			$Order->location = request('location');
            $Order->employee = request('employee');
            $Order->timezone_name = request('timezone_name');
            $Order->datatrans_day = request('datatrans_day');
            $Order->datatrans_time = request('datatrans_time');
            $Order->client_name = request('client_name');
            $Order->phone_num = request('phone_num');
            $Order->client_email = request('client_email');
            $Order->client_comment = request('client_comment');
            $Order->datatrans_payment = request('datatrans_payment');
            $Order->status = request('status');
            $Order->own_id = request('own_id');
            $Order->save();
            
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            
            return response()->json(['success'=>false]);
        }  
    }
    public function update($id){
        $transactionId = DB::table('datatrans_orders')->where('id', $id)->get();
        try{
            DB::table('datatrans_orders')->where('id', $id)->update([
                'service_name' => request('uservice_name'),
                'category_name'=> request('ucategory_name'),
				'location'=> request('ulocation'),
                'employee'=> request('uemployee'),
                'timezone_name' => request('utimezone_name'),
                'datatrans_day' => str_replace('-', ':', request('udatatrans_day')),
                'datatrans_time' => request('udatatrans_time'),
                'client_name' => request('uclient_name'),
                'phone_num' => request('uphone_num'),
                'client_email' => request('uclient_email'),
                'client_comment' => request('uclient_comment'),
                'datatrans_payment' => request('udatatrans_payment'),
                'status' => request('ustatus')
            ]);
            $mailcontents = DB::table('users')->where('id', Auth::user()->id)->get();
            
            if(request('ustatus') == 'declined'){
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents[0]->declinedsetfrom);
                $email->setSubject($mailcontents[0]->declinedsetsubject);
                $email->addTo($transactionId[0]->client_email, "User");
                $email->addContent("text/plain", "Message");
                $email->addContent(
                    "text/html", $mailcontents[0]->declinedsetcontent
                );
                
                $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

                $response = $sendgrid->send($email);
                if($transactionId[0]->datatrans_payment == 'online'){
                    $url = 'https://api.datatrans.com/v1/transactions/'. $transactionId[0]->transactionId .'/cancel';
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL =>  $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                        "refno": "cancel"
                    }',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Basic MzAwMDAyMTE5NTp0ekpQNUtJVFVCSUFBUHhO',
                        'Content-Type: application/json'
                    ),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                }
            }
            else if(request('ustatus') == 'Confirmed'){
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents[0]->confirmsetfrom);
                $email->setSubject($mailcontents[0]->confirmsetsubject);
                $email->addTo($transactionId[0]->client_email, "User");
                $email->addContent("text/plain", "Message");
                $email->addContent(
                    "text/html", $mailcontents[0]->confirmsetcontent
                );
                
                $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

                $response = $sendgrid->send($email);
				
				$lcoation = DB::table('users')->where('name', request('ulocation'))->get()[0];
                
                $employee = DB::table('users')->where('name', request('uemployee'))->get()[0];
                if($lcoation->setcalendar == 1){
                    function getLocation($locationId)
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
                        $tokenPath = 'token'.$locationId.'.json';
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
                    $locationId = $lcoation->id;
                    // Get the API client and construct the service object.
                    $client = getLocation($locationId);
                    $service = new Calendar($client);

                    $services = DB::table('datatrans_services')->where('own_id', Auth::user()->id)->where('title', request('uservice_name'))->get();
                    
                    $secs = strtotime(request('udatatrans_time'))+$services[0]->duration;
                    $result = date("H:i:s", $secs);
                
                    // Print the next 10 events on the user's Event.
                    
                    $event = new Event(array(
                        'summary' => request('uservice_name'),
                        'location' => request('ucategory_name'),
                        'description' => request('uclient_name').'('.request('uclient_email').') "s Order',
                        'start' => array(
                        'dateTime' => request('udatatrans_day').'T'.request('udatatrans_time').'+03:00',
                        ),
                        'end' => array(
                        'dateTime' => request('udatatrans_day').'T'.$result.'+03:00',
                        ),
                        'reminders' => array(
                            'useDefault' => FALSE,
                            'overrides' => array(
                                array('method' => 'email', 'minutes' => 24 * 60),
                                array('method' => 'popup', 'minutes' => 10),
                            )
                        ),
                        'colorId' => 2
                    ));
                    
                    $calendarId = 'primary';
                    $event = $service->events->insert($calendarId, $event);
                }

                if($employee->setcalendar == 1){
                    function getLocation($locationId)
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
                        $tokenPath = 'token'.$locationId.'.json';
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
                    $locationId = $lcoation->id;
                    // Get the API client and construct the service object.
                    $client = getLocation($locationId);
                    $service = new Calendar($client);

                    $services = DB::table('datatrans_services')->where('own_id', Auth::user()->id)->where('title', request('uservice_name'))->get();
                    
                    $secs = strtotime(request('udatatrans_time'))+$services[0]->duration;
                    $result = date("H:i:s", $secs);
                
                    // Print the next 10 events on the user's Event.
                    
                    $event = new Event(array(
                        'summary' => request('uservice_name'),
                        'location' => request('ucategory_name'),
                        'description' => request('uclient_name').'('.request('uclient_email').') "s Order',
                        'start' => array(
                        'dateTime' => request('udatatrans_day').'T'.request('udatatrans_time').'+03:00',
                        ),
                        'end' => array(
                        'dateTime' => request('udatatrans_day').'T'.$result.'+03:00',
                        ),
                        'reminders' => array(
                            'useDefault' => FALSE,
                            'overrides' => array(
                                array('method' => 'email', 'minutes' => 24 * 60),
                                array('method' => 'popup', 'minutes' => 10),
                            )
                        ),
                        'colorId' => 2
                    ));
                    
                    $calendarId = 'primary';
                    $event = $service->events->insert($calendarId, $event);
                }
				
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

                    $services = DB::table('datatrans_services')->where('own_id', Auth::user()->id)->where('title', request('uservice_name'))->get();
                    
                    $secs = strtotime(request('udatatrans_time'))+$services[0]->duration;
                    $result = date("H:i:s", $secs);
                
                    // Print the next 10 events on the user's Event.
                    
                    $event = new Event(array(
                        'summary' => request('uservice_name'),
                        'location' => request('ucategory_name'),
                        'description' => request('uclient_name').'('.request('uclient_email').') "s Order',
                        'start' => array(
                        'dateTime' => request('udatatrans_day').'T'.request('udatatrans_time').'+03:00',
                        ),
                        'end' => array(
                        'dateTime' => request('udatatrans_day').'T'.$result.'+03:00',
                        ),
                        'reminders' => array(
                            'useDefault' => FALSE,
                            'overrides' => array(
                                array('method' => 'email', 'minutes' => 24 * 60),
                                array('method' => 'popup', 'minutes' => 10),
                            )
                        ),
                        'colorId' => 2
                    ));
                    
                    $calendarId = 'primary';
                    $event = $service->events->insert($calendarId, $event);
                }
				
				
            	return response()->json(['success'=>true]);
            }
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    public function delete($id){
     
        try{
            DB::table('datatrans_orders')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }
}