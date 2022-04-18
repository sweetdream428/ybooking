<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatatransLanguageController extends Controller
{
    // set locale in session
    public function swap($locale){
        // available language in template array
        $availLocale = [ 
            'en'=>'en',
            'de'=>'de',
        ];
        // check for existing language
        if (array_key_exists($locale, $availLocale)) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}
