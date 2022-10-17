@extends('Header.header')
@section('page_title','Donor List')

@section('content')

<div class="container-fluid">
  
           @isset($message_success)
              <div class="alert alert-success">
           {!! $message_success  !!}</div>
          
           @endisset

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">DONORS LIST</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Donor List</h6>
            </div>
            <div class="row">
            <div class="col-md-6">
            <!-- <form type="get" action="{{url('search')}}" > -->
            <input type="search" id="search_box" class="form-control mr-sm-2" id="name" placeholder="Seach Blood group OR State Name" name="query" value="" >
            <button type="" id="search_text" class="btn btn-primary" >Submit</button>
 
            <!-- </form> -->
            </div>
            <div class="col-md-6">
            <form type="get" action="{{url('search_state')}}" >
            <div class="form-group">
          <select id="sel_st" class="form-control " name="state_id" >
          <option  value="">Select State</option>

          </select>
          
    
          </div>

            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
 
            </form>
            </div>
            </div>
                            <table class="table" id ="table_id">
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
                    <tbody id="table_body">
                    @foreach($Donors as $Donor)
                    <tr>
                        <td>{{$Donor->name }}</td>
                        <td>{{$Donor->gender }}</td>
                        <td>{{$Donor->age }}</td>
                        <td>{{$Donor->mobile_no }}</td>
                        <td>{{$Donor->blood_group }}</td>
                        <td>{{$Donor->positive_date }}</td>
                        <td>{{$Donor->negative_date }}</td>
                        <td>{{$Donor->state->name}}</td>
                        <td>{{$Donor->city->name}}</td>
                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            <div class ="mt-3">
            {{$Donors->links()}}
</div>
              
            </div>
 </div>
</div>


       @endsection

       @section('script')
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
         $(document).ready(function () {
           
                $("#sel_st").html('');
                $.ajax({
                    url: "{{url('/fetch-state')}}",
                    type: "GET",
                     dataType: 'json',
                    success: function (res) {
                        $('#sel_st').html('<option value="">Select State</option>');
                        $.each(res.state, function (key, value) {
                            $("#sel_st").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
           
              
           
       
         });
 
         $(document).ready(function () {
         $('#search_text').click(function () {
                  
                    var idState =  $('#search_box').val();
                  
                  
                $("#search_box").html('');
                $.ajax({
                    url: "{{url('search')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('tbody').html('');
                        $.each(res.Donor, function (key, value) {
                            console.log(value);
                            $("tbody").append('<tr><td>' +value.name + '</td><td>' +value.gender + '</td><td>' + value.age + '</td><td>' +value.mobile_no + '</td><td>' +value.blood_group + '</td><td>' + value.positive_date + '</td><td>' +value.negative_date+ '</td><td>' +value.state_name+ '</td><td>' +value.city_name+ '</td><tr>');
                            
                        });
                    }
                });
            });
        });
   
 </script>
 @endsection 