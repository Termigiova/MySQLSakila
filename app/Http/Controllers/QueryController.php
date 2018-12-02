<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Store;
use Illuminate\Routing\Controller as BaseController;

class QueryController extends BaseController
{

    public function query() {


        // Get films that had a certain actor
        $start = microtime(true);
        $film = Film::whereHas('actors', function($query) {
            $query->where([
                ['first_name', 'like', 'PENELOPE'],
                ['last_name', 'like', 'GUINESS']
            ]);
        })->get();
        $time = microtime(true) - $start;

        // Get films that are documentaries
        $start = microtime(true);
        $film = Film::whereHas('categories', function($query) {
            $query->where([
                ['name', 'like', 'Documentary'],
            ]);
        })->get();
        $time = microtime(true) - $start;

        // Get stores in canada
        $start = microtime(true);
        $stores = Store::with(['address.city.country' => function ($query) {
            $query->where('country', '=', "Canada");
        }])->get();
        $time = microtime(true) - $start;

        // All stores updated at 16/11/2018
//        $start = microtime(true);
//        $stores = Store::where('last_update', 'like', '2006-02-15 04:57:12')->get();
//        $time = microtime(true) - $start;

        return view('query')->with('time',$time);
    }

}
