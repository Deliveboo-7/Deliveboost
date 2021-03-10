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

            <a href="{{ route('dishes-index') }}" class="restButton col-2 offset-2 py-3 my-4">
                <i class="fas fa-hamburger fa-5x"></i><br>
                <span>MY FOODS</span>
            </a>
            <a href="{{ route('orders-index') }}" class="restButton col-2 offset-1 py-3 my-4">
                <i class="fas fa-clipboard fa-5x"></i><br>
                <span>MY ORDERS</span>


            </a>
            <a href="#" class="restButton col-2 offset-1 py-3 my-4">
                <i class="fas fa-chart-line fa-5x"></i><br>
                <span>MY STATS</span>
            </a>
        </div>

    </div>

</div>

@endsection

