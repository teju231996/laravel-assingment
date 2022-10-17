<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\city;
use App\Models\Donor;
use DB;


class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Donor = Donor::orderBy('created_at','DESC')->paginate(10);
        return view('Donors.donor_list')->with([
            'Donors' => $Donor
        ]);
        
        
    }

    
    public function search_text(Request $request){
     
   
        //$search_text = $_GET['query'];

      $search_text = $request->state_id;
        // $Donor = Donor::where('blood_group','Like', '%'.$search_text.'%')->paginate(10);
        // return view('Donors.donor_list')->with([
        //     'Donors' => $Donor
        // ]);
        

       
                      
        $data['Donor']   =  DB::table('donors')
                        ->select(DB::raw('donors.gender , donors.name, donors.negative_date, donors.positive_date , donors.age as age, donors.mobile_no, donors.blood_group, donors.state_id, states.id ,cities.name as city_name ,states.name as state_name'))
                        ->join('states', function ($join) {
                            $join->on('states.id', '=', 'donors.state_id');
                        })
                        ->join('cities', function ($join) {
                            $join->on('cities.id', '=', 'donors.city_id');
                        })
                        ->where('donors.blood_group', 'like', '%'.$search_text.'%')
                        ->orwhere('states.name', 'like', '%'.$search_text.'%')
                        ->get(['name','age' ,'gender', 'mobile_no', 'blood_group','city_name','positive_date','negative_date','state_name','city_name']);
                                        
                        return response()->json($data);
        

        
    }

    public function search_state(){
        $search_text = $_GET['state_id'];
        $Donor = Donor::where('state_id',$search_text)->paginate(10);
        return view('Donors.donor_list')->with([
            'Donors' => $Donor
        ]);

    }

    public function fetchCity(Request $request)
    {
        
        $data['cities'] = city::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['state'] = state::where("country_id",'101')->get(["name", "id"]);
        return view('Donors.create_donor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' =>'required',
            'gender'=>'required',
            'age'=>'required|integer|between:18,60',
            'mobile_no'=>'required|min:10|max:11',
            'blood_group'=>'required',
            'positive_date'=>'required',
            'negative_date'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
              ]);

            $Donor = new Donor([
                'name' => $request['name'],
                'gender' => $request['gender'],
                'age' => $request['age'],
                'mobile_no' => $request['mobile_no'],
                'blood_group' => $request['blood_group'],
                'positive_date' => $request['positive_date'],
                'negative_date' => $request['negative_date'],
                'state_id' => $request['state_id'],
                'city_id' => $request['city_id'],
               

                ]);

                $Donor->save();
              
               return redirect()->back()->with(
            [
                'message' => " Donor Added successfully"
            ]
        );
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetch_state(){

        $data['state'] = state::where("country_id",'101')->get(["name", "id"]);
        return response()->json($data);
      
    }
  

}
