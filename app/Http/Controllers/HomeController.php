<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\city;
use App\Models\Donor;
use App\Models\PlasmaReq;
use DB;

class HomeController extends Controller
{
    //

    public function index(Request $request)
    {
      
        $Donor      = Donor::all()->count();
        $PlasmaReq  = PlasmaReq::all()->count();
       
       
        
        $user_info = DB::table('states')
                 ->select(DB::raw('count(donors.name) as count' ),'states.name as sname')
                 ->join('donors', 'donors.state_id', '=', 'states.id')
                  ->groupBy('donors.state_id')
                 ->get();

             
                 $plasma_list = DB::table('states')
                 ->select(DB::raw('count(plasma_reqs.name) as count' ),'states.name as sname')
                 ->join('plasma_reqs', 'plasma_reqs.state_id', '=', 'states.id')
                  ->groupBy('plasma_reqs.state_id')
                 ->get();

// SELECT  states.name, COUNT(don.name)as donor_n, COUNT(pl.name)as plas_n
// FROM states
// LEFT JOIN donors as don ON states.id = don.state_id
// LEFT JOIN plasma_reqs as pl ON states.id = pl.state_id
// GROUP by states.name
                
          return view('dashboard', compact('PlasmaReq','Donor','user_info','plasma_list'));
    }

}
