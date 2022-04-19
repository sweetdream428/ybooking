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

    // public function createpage(){
    //     $categories = DB::table('datatrans_categories')->get();
    //     return view('service/createpage')->with('categories', $categories);
    // }

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
        return view('service/createpage')->with('services', $services)->with('categories', $categories)->with('locations', $locations)->with('employees', $employees)->with('createId', $createId);
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

    public function update($id){
        
        try{
            DB::table('datatrans_services')->where('id', $id)->update([
                'title' => request('utitle'),
				'category' => request('ucategory'),
                'employee' => request('uemployee'),
                'location' => request('ulocation'),
                'duration' => request('uduration'),
                'duration_name' => request('uduration_name'),
                'price' => request('uprice'),
                'start_time' => request('ustart_time'),
                'end_time' => request('uend_time'),
                'sun' => request('usun')?1:0,
                'mon' => request('umon')?1:0,
                'tue' => request('utue')?1:0,
                'wed' => request('uwed')?1:0,
                'thu' => request('uthu')?1:0,
                'fri' => request('ufri')?1:0,
                'sat' => request('usat')?1:0,
                'allow' => request('uallow')
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


}