@extends('Header.header')
@section('page_title','Plasma List')

@section('content')

<div class="container-fluid">
  
           @isset($message_success)
              <div class="alert alert-success">
           {!! $message_success  !!}</div>
          
           @endisset

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">PLASMA REQUEST LIST</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Plasma List</h6>
            </div>
            <div class="row">
            <div class="col-md-6">
            <form type="get" action="{{url('search_plasma')}}" >
            <input type="search" class="form-control mr-sm-2" id="name" placeholder="seach Blood group" name="query" value="" >
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
 
            </form>
            </div>
            <div class="col-md-6">
            <form type="get" action="{{url('search_state_plasma')}}" >
            <div class="form-group">
          <select id="state-dd" class="form-control " name="state_id" >
          <option  value="">Select State</option>

          @foreach ($Plasmas as $Plasma)
                                  <option value="{{$Plasma->state->id}}">
                                  <td>{{$Plasma->state->name}}</td>
                                  </option>
                                 
                                  @endforeach
          </select>
          
    
          </div>

            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
 
            </form>
            </div>
            </div>
                            <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Phone No</th>
                        <th>Blood_group</th>
                        <th>Positive_date</th>
                        <th>Negative_date</th>
                        <th>State</th>
                        <th>City</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Plasmas as $Plasma)
                    <tr>
                        <td>{{$Plasma->name }}</td>
                        <td>{{$Plasma->gender }}</td>
                        <td>{{$Plasma->age }}</td>
                        <td>{{$Plasma->mobile_no }}</td>
                        <td>{{$Plasma->blood_group }}</td>
                        <td>{{$Plasma->positive_date }}</td>
                        <td>{{$Plasma->negative_date }}</td>
                        <td>{{$Plasma->state->name}}</td>
                        <td>{{$Plasma->city->name}}</td>
                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            <div class ="mt-3">
            {{$Plasmas->links()}}
</div>
              
            </div>
 </div>
</div>


       @endsection
