@extends('Header.header')
@section('page_title','Add PlasmaRequest')

@section('content')
<div class="container">
{{--
  @if($errors->any())
             <div class="alert alert-danger">
              <ul class="mb-0">
               @foreach($errors->all() as $error)
              <li>{!! $error !!}</li>
               @endforeach
              </ul>
               </div>
             @endif
--}}
 
</div>

 <div class="container">
<!--  
@isset($message_success)
   <div class="alert alert-success">
    {!! $message_success !!}
 </div>

@endisset  -->
        @if(session('message'))
           <div class="alert alert-success">
          {{ Session::get('message') }}</div>
             @endif



  <h1>Add Plasma Request </h1>
  <br>
  
<form method="POST" action="{{route('Plasma.store')}}" id="" enctype="multipart/form-data">   
@csrf
    <div class="form-group">
      <label for="user">Name:</label>
      <input type="text" class="form-control {{ $errors->has('name')? 'border-danger':'' }} " id="name" placeholder="Enter First Name" name="name" value="{{old('name')}}" autofocus autocomplete="on" onchange="FirstName()"  >
       <small id="name" class="form-text text-danger">{!! $errors->first('name') !!}</small>
    </div>

   <div class="form-group">
     <label for="user">Gender:</label>
     <div  class="form-control {{ $errors->has('name')? 'border-danger':'' }} ">
         <input type="radio"  name="gender" value="Male" >  <label for="user">Male:</label>
         <input type="radio" name="gender" value="Female"><label for="user">Female:</label>
      </div>
      <small class="form-text text-danger">{!! $errors->first('gender') !!}</small>
   </div>
    
   <div class="form-group">
      <label for="user">Age:</label>
      <input type="text" class="form-control {{ $errors->has('age')? 'border-danger':'' }} " id="age" placeholder="Enter Age " name="age" value="{{old('age')}}"  autofocus autocomplete="on"  onchange="FirstName()" >
      <small class="form-text text-danger">{!! $errors->first('age') !!}</small>
    </div>

    <div class="form-group">
      <label for="user">phone Number:</label>
      <input type="text" class="form-control {{ $errors->has('mobile_no')? 'border-danger':'' }} " id="mobile_no" placeholder="Enter First Name" name="mobile_no" value="{{old('mobile_no')}}" autofocus autocomplete="on" onchange="FirstName()"  >
      <small class="form-text text-danger">{!! $errors->first('mobile_no') !!}</small>
    </div>

    <div class="form-group">
     <label for="user">Blood Group:</label>
     <div>
         <input type="radio" class="form-control"  name="blood_group" value="O+" >  <label for="user">O+:</label>
         <input type="radio" class="form-control"  name="blood_group" value="O-"><label for="user">O-:</label>
         <input type="radio" class="form-control" name="blood_group" value="A+"><label for="user">A+:</label>
         <input type="radio" class="form-control" name="blood_group" value="A-"><label for="user">A-:</label>
         <input type="radio"  class="form-control" name="blood_group" value="AB+"><label for="user">AB+:</label>
         <input type="radio" class="form-control" name="blood_group" value="AB-"><label for="user">AB-:</label>
         <input type="radio" class="form-control" name="blood_group" value="B+"><label for="user">B+:</label>
         <input type="radio" class="form-control" name="blood_group" value="B-"><label for="user">B-:</label>
      </div>
      <small class="form-text text-danger">{!! $errors->first('blood_group') !!}</small>
   </div>

   <div class="form-group">
      <label for="user">Date of Covid-19 positive :</label>
      <input type="date" class="form-control {{ $errors->has('name')? 'border-danger':'' }} " id="positive" placeholder="Enter First Name" name="positive_date" value="{{old('name')}}" autofocus autocomplete="on" onchange="FirstName()" >
      <small class="form-text text-danger">{!! $errors->first('positive_date') !!}</small>
    </div>

    <div class="form-group">
      <label for="user">Date of Covid-19 negative :</label>
      <input type="date"  class="form-control {{ $errors->has('name')? 'border-danger':'' }} " id="nagative" placeholder="Enter First Name" name="negative_date" value="{{old('name')}}" autofocus autocomplete="on" onchange="FirstName()"  >
      <small class="form-text text-danger">{!! $errors->first('negative_date') !!}</small>
    </div>

    <div class="form-group">
            <label for="user">State:</label>
            <select id="state-dd" class="form-control " name="state_id" >
          <option  value="">Select State</option>

          @foreach ($state as $data)
                                  <option value="{{$data->id}}">
                                      {{$data->name}}
                                  </option>
                                  @endforeach
          </select>
          <small class="form-text text-danger">{!! $errors->first('state_id') !!}</small>
    
    </div>

    
    <div class="form-group">
      <label for="user">City:</label>
      <select id="city-dd" class="form-control " name="city_id" >
    
  </select>
  <small class="form-text text-danger">{!! $errors->first('city_id') !!}</small>
  
    </div>

    <button type="submit" id="submit" class="btn btn-primary"> <i class="fa fa-lock" aria-hidden="true"></i> Submit</button>
  </form>
</div>
@endsection

 @section('script')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
          
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });

  
</script>
@endsection 