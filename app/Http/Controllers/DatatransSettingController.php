<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class DatatransSettingController extends Controller
{

    public function index(){
        $settings = DB::table('users')->where('id', Auth::user()->id)->get();
        return view('datatransetting')->with('settings', $settings);
    }

    public function update($id){
        
        try{
            DB::table('users')->where('id', $id)->update([
                'setcolor' => request('color'),
				'setpayment' => request('onlinepayment')
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
}