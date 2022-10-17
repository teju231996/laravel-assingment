{{--<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>--}}
@extends('Header.header')


@section('content')

 <!-- Topbar -->
        
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Donors (Count)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $PlasmaReq }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Plasma Request (Count)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$Donor }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <br>
                <h1> 
               
              Plasma Donor List
              </h1>
              <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Donors Count</th>
                        <th>States Name</th>
                        
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user_info as $user)
                    <tr>
                        <td>{{$user->count }}</td>
                        <td>{{$user->sname }}</td>
                        
                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Card Body -->
                
              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <br>
              <h1> 
              Plasma Request List
              </h1>
              <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th> State Name</th>
                        <th>Cout</th>
                        
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plasma_list as $plas)
                    <tr>
                        <td>{{$plas->sname }}</td>
                        <td>{{$plas->count }}</td>
                       
                        
                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Card Body -->
                
              </div>
            </div>

            <!-- Pie Chart -->
           
          

          <!-- Content Row -->
         

        </div>
        <!-- /.container-fluid -->

     @endsection