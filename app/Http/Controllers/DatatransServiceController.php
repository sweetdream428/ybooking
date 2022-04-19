<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use App\Models\DatatransService;
use Illuminate\Support\Facades\Auth;

class DatatransServiceController extends Controller
{

    public function index(){
        if(Auth::user()->is_superuser == 1){

            $services = DB::table('datatrans_services')->get();
            $categories = DB::table('datatrans_categories')->get();
            $locations = DB::table('users')->where('is_superuser', '3')->get();
            $employees = DB::table('users')->where('is_superuser', '4')->get();

            return view('datatranservice')->with('services', $services)->with('categories', $categories)->with('locations', $locations)->with('employees', $employees);
        }
        else{
            $services = DB::table('datatrans_services')->where('own_id', Auth::user()->id)->get();
            $categories = DB::table('datatrans_categories')->where('own_id', Auth::user()->id)->get();
            $locations = DB::table('users')->where('is_superuser', '3')->where('own_id', Auth::user()->id)->get();
            $employees = DB::table('users')->where('is_superuser', '4')->where('own_id', Auth::user()->id)->get();
            return view('datatranservice')->with('services', $services)->with('categories', $categories)->with('locations', $locations)->with('employees', $employees);
        }  
    }

    public function create(Request $request){
        
        try{
            $services = new DatatransService;
            // $services->title = request('title');
			// $services->category = request('category');
            // $services->employee = request('employee');
            // $services->location = request('location');
            // $services->duration = request('duration');
            // $services->duration_name = request('duration_name');
            // $services->price = request('price');
            // $services->sun = request('sun') ? 1 : 0;
            // $services->mon = request('mon') ? 1 : 0;
            // $services->tue = request('tue') ? 1 : 0;
            // $services->wed = request('wed') ? 1 : 0;
            // $services->thu = request('thu') ? 1 : 0;
            // $services->fri = request('fri') ? 1 : 0;
            // $services->sat = request('sat') ? 1 : 0;
            // $services->allow = request('allow');
            $services->own_id = Auth::user()->id;
            $services->save();

            $id = DB::getPdo()->lastInsertId();


            return response()->json(['success'=>$id]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }

    public function createpage($id) {
        $services = DB::table('datatrans_services')->where('id', $id)->get();
        $categories = DB::table('datatrans_categories')->where('own_id', Auth::user()->id)->get();
        $locations = DB::table('users')->where('is_superuser', '3')->where('own_id', Auth::user()->id)->get();
        $employees = DB::table('users')->where('is_superuser', '4')->where('own_id', Auth::user()->id)->get();
        $createId = $id;
        $mondays = DB::table('mondays')->where('service_id', $id)->get();
        $tuesdays = DB::table('tuesdays')->where('service_id', $id)->get();
        $wednesdays = DB::table('wednesdays')->where('service_id', $id)->get();
        $thursdays = DB::table('thursdays')->where('service_id', $id)->get();
        $fridays = DB::table('fridays')->where('service_id', $id)->get();
        $saturdays = DB::table('saturdays')->where('service_id', $id)->get();
        $sundays = DB::table('sundays')->where('service_id', $id)->get();
        return view('service/createpage')->with('services', $services)->with('categories', $categories)->with('locations', $locations)->with('employees', $employees)->with('createId', $createId)->with('mondays', $mondays)->with('tuesdays', $tuesdays)->with('wednesdays', $wednesdays)->with('thursdays', $thursdays)->with('fridays', $fridays)->with('saturdays', $saturdays)->with('sundays', $sundays);
    }

    public function weekcrate(Request $request){
        
        try{
            DB::table($request->weekname)->insert([
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'date_check' => $request->date_check,
                'selectdata' => $request->selectdata,
                'service_id' => $request->service_id
            ]);
            $id = DB::getPdo()->lastInsertId();
            return response()->json(['success'=>$id]);
        }catch (Exception $e) {
            return response()->json(['success'=>$e]);
        }

    }

    Public function weekremove(Request $request){
        try{
            DB::table($request->weekname)->where('id', $request->real_id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }

    public function weekupdate(Request $request){
        
        try{
            DB::table($request->weekname)->where('id', $request->real_id)->update([
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'date_check' => $request->date_check,
                'selectdata' => $request->selectdata,
                'service_id' => $request->service_id
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }

    public function weekstatus(Request $request){
        try{
            DB::table('datatrans_services')->where('id', $request->id)->update([
                $request->week => $request->status,
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>$e]);
        }
    }

    public function update(){
        
        try{
            DB::table('datatrans_services')->where('id', request('id'))->update([
                'title' => request('title'),
				'category' => request('category'),
                'employee' => request('employee'),
                'location' => request('location'),
                'duration' => request('duration'),
                'duration_name' => request('duration_name'),
                'price' => request('price'),
                'allow' => request('allow')
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    
    public function delete($id){
     
        try{
            DB::table('datatrans_services')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }

    public function selectget($id){
        try{
            $mondays = DB::table('mondays')->where('service_id', $id)->get();
            $tuesdays = DB::table('tuesdays')->where('service_id', $id)->get();
            $wednesdays = DB::table('wednesdays')->where('service_id', $id)->get();
            $thursdays = DB::table('thursdays')->where('service_id', $id)->get();
            $fridays = DB::table('fridays')->where('service_id', $id)->get();
            $saturdays = DB::table('saturdays')->where('service_id', $id)->get();
            $sundays = DB::table('sundays')->where('service_id', $id)->get();
            return response()->json(['mondays'=>$mondays, 'tuesdays'=>$tuesdays, 'wednesdays'=>$wednesdays, 'thursdays'=>$thursdays, 'fridays'=>$fridays, 'saturdays'=>$saturdays, 'sundays'=>$sundays]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }


}