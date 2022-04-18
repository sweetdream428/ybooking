<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatatransMailcontentController extends Controller
{

    public function index(){
        
        $mailcontents = DB::table('users')->where('id', Auth::user()->id)->get();
        return view('datatransmailcontent')->with('mailcontents', $mailcontents);
    
    }

    public function orderupdate($id){
        
        try{
        
            DB::table('users')->where('id', $id)->update([
                'ordersetfrom' => request('ordersetfrom'),
                'ordersetsubject' => request('ordersetsubject'),
                'ordersetcontent' => request('ordersetcontent')  
            ]);
            return response()->json(['success'=>true]);
        
            
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }

    public function confirmupdate($id){
        
        try{
        
            DB::table('users')->where('id', $id)->update([
                'confirmsetfrom' => request('confirmsetfrom'),
                'confirmsetsubject' => request('confirmsetsubject'),
                'confirmsetcontent' => request('confirmsetcontent')  
            ]);
            return response()->json(['success'=>true]);
        
            
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }

    public function declinedupdate($id){
        
        try{
        
            DB::table('users')->where('id', $id)->update([
                'declinedsetfrom' => request('declinedsetfrom'),
                'declinedsetsubject' => request('declinedsetsubject'),
                'declinedsetcontent' => request('declinedsetcontent')  
            ]);
            return response()->json(['success'=>true]);
        
            
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }

}