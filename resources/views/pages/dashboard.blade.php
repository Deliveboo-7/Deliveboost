@extends('layouts.app')

@section('content')

{{-- <div class="dashboard"> --}}

    <div class="container-fluid p-0" id="cover-dashboard">
        <div class="row no-gutters">
            <div class="cover col-12 d-flex flex-row align-items-center justify-content-center">

                <div class="title text-uppercase">
                    <h1> {{Auth::user() -> company_name}}</h1>
                </div>

            </div>

        </div>

    </div>


    <div class="container my-5">

        <div class="row text-silver">
            <div class="col-12 col-md-8 offset-md-2 dashboard-title bord-b py-3">
                <h3 class="text-gold">
                    Restaurant Details
                </h3>
                <hr>
                <ul class="p-0">
                
                    <li class="d-flex justify-content-between">
                        <span class="text-gold">
                            MAIL:
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> email}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-gold">
                            ADDRESS:
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> address}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-gold">
                            VAT:
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> vat}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-gold">
                            PHONE NUMBER:
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> phone_number}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-gold">
                            WEBSITE:
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> website}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-gold">
                            OPENING INFO:
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> opening_info}}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row my-2">

            <div class="col-4 col-sm-4   p-2 ">
                <div class="row p-2 btn-dash m-0">
                    <a href="{{ route('dishes-index') }}" class=" col-12  p-0">      
                    
                        <img src="{{ asset('storage/icons/food.svg') }}" alt="orders" >
                    
                    </a>
                    <h5 class="text-silver text-lighter text-center  col-12  my-1 p-0"> FOODS</h5>
                </div>  
            </div>

            <div class="col-4 col-sm-4  p-2 ">
                <div class="row p-2 m-0 btn-dash">
                    <a href="{{ route('orders-index') }}" class=" col-12  p-0">      
                        <img src="{{ asset('storage/icons/orders.svg') }}" alt="orders" >
                    </a>
                    <h5 class="text-silver text-lighter text-center  col-12 my-1 p-0"> ORDERS</h5>
                </div>  
            </div>

            <div class="col-4 col-sm-4    p-2 ">
                <div class="row p-2 m-0 btn-dash">
                    <a href="{{ route('statistics-index') }}" class=" col-12 p-0">      
                        <img src="{{ asset('storage/icons/stats.svg') }}" alt="orders" >
                    </a>
                    <h5 class="text-silver text-lighter col-12 my-1 p-0"> STATS</h5>
                </div>  
            </div>

        </div>


@endsection



