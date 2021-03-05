@extends('layouts.app')

@section('content')

<div class="dashboard">

    <div class="container-fluid containerPageMenu">
        <div class="row no-gutters">
            <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">

                <div class="align-middle restName text-uppercase">
                    <h1>{{Auth::user() -> company_name}}</h1>
                </div>

            </div>

        </div>

    </div>


    <div class="container restInfoButtons my-5">

        <div class="row">
            <div class="restProfile col-12">
                <ul>
                    <li class="infoTitle">
                        <h5 class="text-gold">
                            INFORMATIONS
                        </h5>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-bold">
                            MAIL: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> email}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-bold">
                            ADDRESS: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> address}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-bold">
                            VAT: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> vat}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-bold">
                            PHONE NUMBER: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> phone_number}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-bold">
                            WEBSITE: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> website}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span class="text-bold">
                            OPENING INFO: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> opening_info}}
                        </span>
                    </li>
                </ul>
            </div>

            <div class="restButton col-4 py-3">
                <i class="fas fa-hamburger fa-7x"></i><br>
                    <div>
                    <span>MY FOODS</span>
                </div>
            </div>
            <div class="restButton col-4 py-3">
                <i class="fas fa-clipboard fa-7x"></i><br>
                <div>
                    <span>MY ORDERS</span>
                </div>
                
                
            </div>
            <div class="restButton col-4 py-3">
                <i class="fas fa-chart-line fa-7x"></i><br>
                <div>
                    <span>MY STATS</span>
                </div>
            </div>
        </div>

    </div>
    
</div>

@endsection

