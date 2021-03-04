@extends('layouts.app')

@section('content')

<div class="dashboard">

    <div class="container-fluid">
        <div class="row">
            <div class="restCover col-sm-12 d-flex justify-content-center align-items-center">
                <img src="https://www.radiolombardia.it/wp-content/uploads/2019/04/Food.jpg" alt="">

                <h1 class="companyName">{{Auth::user() -> company_name}}</h1>
            </div>

        </div>

    </div>


    <div class="container restInfoButtons my-5">

        <div class="row">
            <div class="restProfile col-12">
                <ul>
                    <li class="infoTitle">
                        <h5>
                            INFORMATIONS
                        </h5>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>
                            MAIL: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> email}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>
                            ADDRESS: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> address}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>
                            VAT: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> vat}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>
                            PHONE NUMBER: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> phone_number}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>
                            WEBSITE: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> website}}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>
                            OPENING INFO: 
                        </span>
                        <span class="alignRight">
                            {{Auth::user() -> opening_info}}
                        </span>
                    </li>
                </ul>
            </div>

            <div class="restButton col-4 col-lg-3 py-3">
                <i class="fas fa-hamburger fa-7x"></i><br>
                    <div>
                    <span>MY FOODS</span>
                </div>
            </div>
            <div class="restButton col-4 col-lg-3 py-3">
                <i class="fas fa-clipboard fa-7x"></i><br>
                <div>
                    <span>MY ORDERS</span>
                </div>
                
                
            </div>
            <div class="restButton col-4 col-lg-3 py-3">
                <i class="fas fa-chart-line fa-7x"></i><br>
                <div>
                    <span>MY STATS</span>
                </div>
            </div>
        </div>

    </div>
    
</div>

@endsection

