<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DatatransLocationController extends Controller
{
    public function index(){
        $locations = DB::table('users')->where('is_superuser', '3')->where('own_id', Auth::user()->id)->get();
        return view('locations')->with('locations', $locations);
    }

    public function create(){
        try{
            
            DB::table('users')->insert([
                'name' => request('location'),
                'email' => request('email'),
                'password' => Hash::make(time()),
                'is_superuser' => '3',
                'own_id' => Auth::user()->id
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }
    public function update($id){
        
        try{
            DB::table('users')->where('id', $id)->update([
                'name' => request('ulocation'),
                'email' => request('uemail')
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    public function delete($id){
     
        try{
            DB::table('users')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }

}