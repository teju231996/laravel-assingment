<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\city;
use App\Models\PlasmaReq;

class PlasmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Plasma = PlasmaReq::orderBy('created_at','DESC')->paginate(10);
        return view('PlasmaRequest.plasmaReq_list')->with([
            'Plasmas' => $Plasma
        ]);
        
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
        return view('PlasmaRequest.create_plasmaReq', $data);
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

            $PlasmaReq = new PlasmaReq([
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

                $PlasmaReq->save();
              
               return redirect()->back()->with(
            [
                'message' => " Plasma request Added successfully"
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


    public function search_text(){
     
   
        $search_text = $_GET['query'];
      
        $Plasma = PlasmaReq::where('blood_group','Like', '%'.$search_text.'%')->paginate(10);
        return view('PlasmaRequest.plasmaReq_list')->with([
            'Plasmas' => $Plasma
        ]);
        
        
    }

    public function search_state(){
        $search_text = $_GET['state_id'];
        $Plasma = PlasmaReq::where('state_id',$search_text)->paginate(10);
        return view('PlasmaRequest.plasmaReq_list')->with([
            'Plasmas' => $Plasma
        ]);

    }
}
