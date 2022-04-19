<?php

namespace App\Http\Controllers;

use App\Models\DatatransOnlineorder;
use App\Models\DatatransOrder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Google\Client;
use Google\Service\Calendar;

class DatatransController extends Controller
{
    public function index($name)
    {
        $setcalendar = DB::table('users')->where('name', $name)->get('setcalendar')[0]->setcalendar;
		$setpayment = DB::table('users')->where('name', $name)->get('setpayment')[0]->setpayment;
        if($setcalendar == 1){
            $id = DB::table('users')->where('name', $name)->get('id')[0]->id;
            function getClient($name)
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
                $tokenPath = 'token'.DB::table('users')->where('name', $name)->get('id')[0]->id.'.json';
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
            $client = getClient($name);
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
            
            $categories = DB::table('datatrans_services')->where('own_id', $id)->whereNotNull('location')->whereNotNull('employee')->whereNotNull('title')->where('title','!=','')->get();
            $services = DB::table('datatrans_services')->where('own_id', $id)->whereNotNull('location')->whereNotNull('employee')->whereNotNull('title')->where('title','!=','')->get();
			$locations = DB::table('datatrans_services')->where('own_id', $id)->whereNotNull('location')->whereNotNull('employee')->whereNotNull('title')->where('title','!=','')->groupBy('location')->get();
            $employees = DB::table('datatrans_services')->where('own_id', $id)->whereNotNull('location')->whereNotNull('employee')->whereNotNull('title')->where('title','!=','')->groupBy('employee')->get();

            $orders = array();
            $orders_service_name = DB::table('datatrans_orders')
                ->where('own_id', $id)
                ->groupBy('service_name', 'datatrans_day', 'datatrans_time')
                ->get();
			$emorders = $orders_service_name;
            for ($i = 0; $i < count($orders_service_name); $i++) {
                $order_num = DB::table('datatrans_orders')->where('own_id', $id)->where('service_name', $orders_service_name[$i]->service_name)->where('datatrans_day', $orders_service_name[$i]->datatrans_day)->where('datatrans_time', $orders_service_name[$i]->datatrans_time)->count();

                foreach ($services as $service) {

                    if ($service->title == $orders_service_name[$i]->service_name && $order_num >= $service->allow) {
                        array_push($orders, $orders_service_name[$i]);
                    }
                }
            }
            $submerchantID = DB::table('datatrans_merchants')->where('own_id', $id)->get('merchant_id')[0]->merchant_id;

            return view('service')->with('categories', $categories)->with('services', $services)->with('orders', $orders)->with('id', $id)->with('submerchantID', $submerchantID)->with('events', $events)->with('locations', $locations)->with('employees', $employees)->with('emorders', $emorders)->with('setpayment', $setpayment);
        }
        else{
            $id = DB::table('users')->where('name', $name)->get('id')[0]->id;
            $events = [];
            
            $categories = DB::table('datatrans_services')->where('own_id', $id)->whereNotNull('location')->whereNotNull('employee')->whereNotNull('title')->where('title','!=','')->get();
            $services = DB::table('datatrans_services')->where('own_id', $id)->whereNotNull('location')->whereNotNull('employee')->whereNotNull('title')->where('title','!=','')->get();
			$locations = DB::table('datatrans_services')->where('own_id', $id)->groupBy('location')->whereNotNull('location')->whereNotNull('employee')->whereNotNull('title')->where('title','!=','')->get();
            $employees = DB::table('datatrans_services')->where('own_id', $id)->groupBy('employee')->whereNotNull('location')->whereNotNull('employee')->whereNotNull('title')->where('title','!=','')->get();

            $orders = array();
            $orders_service_name = DB::table('datatrans_orders')
                ->where('own_id', $id)
                ->groupBy('service_name', 'datatrans_day', 'datatrans_time')
                ->get();
			$emorders = $orders_service_name;
            for ($i = 0; $i < count($orders_service_name); $i++) {
                $order_num = DB::table('datatrans_orders')->where('own_id', $id)->where('service_name', $orders_service_name[$i]->service_name)->where('datatrans_day', $orders_service_name[$i]->datatrans_day)->where('datatrans_time', $orders_service_name[$i]->datatrans_time)->count();

                foreach ($services as $service) {

                    if ($service->title == $orders_service_name[$i]->service_name && $order_num >= $service->allow) {
                        array_push($orders, $orders_service_name[$i]);
                    }
                }
            }
            $submerchantID = DB::table('datatrans_merchants')->where('own_id', $id)->get('merchant_id')[0]->merchant_id;

            return view('service')->with('categories', $categories)->with('services', $services)->with('orders', $orders)->with('id', $id)->with('submerchantID', $submerchantID)->with('events', $events)->with('locations', $locations)->with('employees', $employees)->with('emorders', $emorders)->with('setpayment', $setpayment);
        }
    }
	
	 public function getservice(Request $request)
    {
        try {
            $id = $request->id;
            
            $locationname = $request->locationname;
            $employeename = $request->employeename;
            if($locationname == ''){
                $categories = DB::table('datatrans_services')->where('own_id', $id)->where('employee', $employeename)->groupBy('category')->get();
                $services = DB::table('datatrans_services')->where('own_id', $id)->where('employee', $employeename)->get();
                $locations = DB::table('datatrans_services')->where('own_id', $id)->groupBy('location')->where('employee', $employeename)->get();
                $employees = DB::table('datatrans_services')->where('own_id', $id)->groupBy('employee')->get();
            }
            else if($employeename == ''){
                $categories = DB::table('datatrans_services')->where('own_id', $id)->where('location', $locationname)->groupBy('category')->get();
                $services = DB::table('datatrans_services')->where('own_id', $id)->where('location', $locationname)->get();
                $locations = DB::table('datatrans_services')->where('own_id', $id)->groupBy('location')->get();
                $employees = DB::table('datatrans_services')->where('own_id', $id)->groupBy('employee')->where('location', $locationname)->get();
            }
            else{
                $categories = DB::table('datatrans_services')->where('own_id', $id)->where('location', $locationname)->where('employee', $employeename)->groupBy('category')->get();
                $services = DB::table('datatrans_services')->where('own_id', $id)->where('location', $locationname)->where('employee', $employeename)->get();
                $locations = DB::table('datatrans_services')->where('own_id', $id)->groupBy('location')->where('employee', $employeename)->get();
                $employees = DB::table('datatrans_services')->where('own_id', $id)->groupBy('employee')->where('location', $locationname)->get();
            }
            

            return response()->json(['categories' => $categories, 'services' => $services, 'locations' => $locations, 'employees' => $employees]);
        }catch(Exception $e){
            dd($e);
            return response()->json(['success' => false]);
        }
    }
	
    public function create(Request $request)
    {
        // "Dear " . $request->client_name . "<p>We expect you on " . $request->datatrans_day . " at " . $request->datatrans_time . "<p>Thank you for choosing our company.</p>";

        try {
            $mailcontents = DB::table('users')->where('id', $request->own_id)->get();
			 $service_prices = DB::table('datatrans_services')->where('title', $request->service_name)->where('own_id', $request->own_id)->get();
            
            foreach($service_prices as $service_price){
                $product_price = $service_price->price;
            }
            $email = new \SendGrid\Mail\Mail();

            $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents[0]->ordersetfrom);
            $email->setSubject($mailcontents[0]->ordersetsubject);
            $email->addTo($request->client_email, "User");
            $email->addContent("text/plain", "Message");
            $email->addContent(
                "text/html", "<p>" . $mailcontents[0]->ordersetcontent . "</p>" . "<button style='width:300px;height:100px;background-color:#f4662f;font-size:16px;color:#fff;font-weight:bold;border-radius:30px;border:none;'>" . explode(':',$request->datatrans_day)[2] . "." . explode(':',$request->datatrans_day)[1] . "." . explode(':',$request->datatrans_day)[0] . "." . $request->datatrans_time ."<br>".$request->service_name. " : " .$product_price." : ".$request->datatrans_payment."<br>".$mailcontents[0]->email."(reply)"."</button>" 
            );
            $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

            $response = $sendgrid->send($email);
			
			$client_email = new \SendGrid\Mail\Mail();

            $client_email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents[0]->ordersetfrom);
            $client_email->setSubject($mailcontents[0]->ordersetsubject);
            $client_email->addTo($mailcontents[0]->email, "Admin");
            $client_email->addContent("text/plain", "Message");
            $client_email->addContent(
                "text/html", "<p>" . $mailcontents[0]->ordersetcontent . "</p>" . "<button style='width:300px;height:100px;background-color:#f4662f;font-size:16px;color:#fff;font-weight:bold;border-radius:30px;border:none;'>" . explode(':',$request->datatrans_day)[2] . "." . explode(':',$request->datatrans_day)[1] . "." . explode(':',$request->datatrans_day)[0] . "." . $request->datatrans_time ."<br>".$request->service_name. " : " .$product_price." : ".$request->datatrans_payment."<br>".$request->client_email."(reply)"."</button>"
            );
            $client_sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

            $client_response = $client_sendgrid->send($client_email);

            $Order = new DatatransOrder;
            $Order->service_name = $request->service_name;
            $Order->category_name = $request->category_name;
			$Order->location = $request->location;
            $Order->employee = $request->employee;
            $Order->timezone_name = $request->timezone_name;
            $Order->datatrans_day = $request->datatrans_day;
            $Order->datatrans_time = $request->datatrans_time . ':00';
            $Order->client_name = $request->client_name;
            $Order->phone_num = $request->phone_num;
            $Order->client_email = $request->client_email;
            $Order->client_comment = $request->client_comment;

            $Order->datatrans_payment = $request->datatrans_payment;
            $Order->own_id = $request->own_id;
            $Order->save();

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            dd($e);
            return response()->json(['success' => false]);
        }
    }

    public function transactionget(Request $request)
    {
        $price = $request->price;
        $service_name = $request->service_name;
        $category_name = $request->category_name;
		$location = $request->location;
        $employee = $request->employee;
        $timezone_name = $request->timezone_name;
        $datatrans_day = $request->datatrans_day;
        $datatrans_time = $request->datatrans_time;
        $client_name = $request->client_name;
        $phone_num = $request->phone_num;
        $client_email = $request->client_email;
        $client_comment = $request->client_comment;
        $datatrans_payment = $request->datatrans_payment;
        $own_id = $request->own_id;
        $submerchantid = $request->submerchantid;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.datatrans.com/v1/transactions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "currency": "CHF",
                "refno": "datatrans",
                "amount": ' . $price . ',
                "paymentMethods": ["ECA","VIS","TWI"],
                "autoSettle": false,
                "option": {
                    "createAlias": true
                },
                "redirect": {
                    "successUrl": "https://ybooking.ch/datatrans-service-pay",
                    "cancelUrl": "https://ybooking.ch/datatrans-service-cancel",
                    "errorUrl": "https://ybooking.ch/datatrans-service-error"
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic MzAwMDAyMTE5NTp0ekpQNUtJVFVCSUFBUHhO',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response = str_replace(['transactionId', '{', '}', ':', '"', ' '], ['', '', '', '', '', ''], $response);

        curl_close($curl);
        $Onlineorder = new DatatransOnlineorder;
        $Onlineorder->service_name = $service_name;
        $Onlineorder->category_name = $category_name;
		$Onlineorder->location = $location;
        $Onlineorder->employee = $employee;
        $Onlineorder->timezone_name = $timezone_name;
        $Onlineorder->datatrans_day = $datatrans_day;
        $Onlineorder->datatrans_time = $datatrans_time;
        $Onlineorder->client_name = $client_name;
        $Onlineorder->phone_num = $phone_num;
        $Onlineorder->client_email = $client_email;
        $Onlineorder->client_comment = $client_comment;
        $Onlineorder->datatrans_payment = $datatrans_payment;
        $Onlineorder->own_id = $own_id;
        $Onlineorder->price = $price;
        $Onlineorder->submerchantid = $submerchantid;
        $Onlineorder->transactionId = $response;
        $Onlineorder->save();

        return response()->json(['success' => $response]);
    }

    public function pay(Request $request)
    {
        $transactionId = (int) $request->datatransTrxId;
        $orders = DB::table('datatrans_onlineorders')->where('transactionId', $transactionId)->get();
        $url = "https://api.datatrans.com/v1/transactions/" . $transactionId . "/settle";
        $total_amount = (int) $orders[0]->price;
        $fee_amount = $total_amount * 3.5 / 100;
        $subMerchantId = $orders[0]->submerchantid;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "currency": "CHF",
            "amount": ' . $total_amount . ',
            "refno": "datatrans",
            "marketplace" : {
                "splits" : [ {
                    "subMerchantId": ' . $subMerchantId . ',
                    "amount": ' . $total_amount . ',
                    "commission": ' . $fee_amount . '
                } ]
            }
        }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic MzAwMDAyMTE5NTp0ekpQNUtJVFVCSUFBUHhO',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $mailcontents = DB::table('users')->where('id', $orders[0]->own_id)->get();
        $service_prices = DB::table('datatrans_services')->where('title', $orders[0]->service_name)->where('own_id', $orders[0]->own_id)->get();
        
        foreach($service_prices as $service_price){
            $product_price = $service_price->price;
        }

        $email = new \SendGrid\Mail\Mail();

        $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents[0]->ordersetfrom);
        $email->setSubject($mailcontents[0]->ordersetsubject);
        $email->addTo($orders[0]->client_email, "User");
        $email->addTo($mailcontents[0]->email, "Admin");
        $email->addContent("text/plain", "Message");
        $email->addContent(
            "text/html", "<button style='width:300px;height:100px;background-color:#f4662f;font-size:16px;color:#fff;font-weight:bold;border-radius:30px;border:none;'>" . $orders[0]->datatrans_day . ":" . $orders[0]->datatrans_time ."<br>".$orders[0]->service_name. " : " .$product_price." : Online"."<br>".$mailcontents[0]->email."(reply)"."</button>" . "<p>" . $mailcontents[0]->ordersetcontent . "</p>"
        );

        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

        $response = $sendgrid->send($email);

        $Order = new DatatransOrder;
        $Order->service_name = $orders[0]->service_name;
        $Order->category_name = $orders[0]->category_name;
		$Order->location = $orders[0]->location;
        $Order->employee = $orders[0]->employee;
        $Order->timezone_name = $orders[0]->timezone_name;
        $Order->datatrans_day = $orders[0]->datatrans_day;
        $Order->datatrans_time = $orders[0]->datatrans_time . ':00';
        $Order->client_name = $orders[0]->client_name;
        $Order->phone_num = $orders[0]->phone_num;
        $Order->client_email = $orders[0]->client_email;
        $Order->client_comment = $orders[0]->client_comment;
        $Order->datatrans_payment = $orders[0]->datatrans_payment;
        $Order->own_id = $orders[0]->own_id;
        $Order->transactionId = $orders[0]->transactionId;
        $Order->save();

        return view('thankyou');
    }

    public function error(Request $request)
    {
        return redirect('/');
    }

    public function cancel(Request $request)
    {
        return redirect('/');
    }

}
