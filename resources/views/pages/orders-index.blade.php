@extends('layouts.app')

@section('content')

    <div class="myorders">

        <div class="container-fluid containerPageMenu">
            <div class="row no-gutters">
                <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">

                    <div class="align-middle restName text-uppercase">
                        <h1>my orders</h1>
                    </div>

                </div>

            </div>

        </div>


        <div class="container center">
            {{-- <div class="row">
                <div class="titleMyFoods col-sm-12 mb-4">
                    <h1>I miei piatti</h1>
                </div>

            </div> --}}

            @if (session('created'))
                <div class="btn-gold my-2 text-center test-open">
                    {{ session('created') }}
                </div>
            @endif

            {{-- <div class="row">
                <button class="addDish col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4 btn-gold" >
                    <a href="{{ route('dishes-create') }}">Inserisci nuovo piatto</a>
                </button>
            </div> --}}
            <h3 style="font-size: 2em; color: purple; text-align: center;" class="py-5 col-12 text-uppercase">
                tutti gli ordini già in database, non quelli dell'user
            </h3>


            <div class="accordion " id="accordion">

                @foreach ($orders as $order)

                    <div class="row cardContainer backColorBody borderGold">
                        <div class="card-header card orderCard col-md-8 offset-md-2 col-lg-6 offset-lg-3" id="heading-{{$order -> id}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#collapse-{{$order -> id}}" aria-controls="collapse-{{$order -> id}}" aria-expanded="false">
                                    <span>
                                        ORDER ID : {{$order -> id}}
                                    {{--        dishes: {{ $order -> dishes }}--}}
                                    </span>
                                    <span>
                                        ORDER DATE : {{ $order -> date }}
                                    </span>
                                </button>
                            </h2>
                        </div>

                        <div id="collapse-{{$order -> id}}" class="orderInfo orderCard collapse card col-md-8 offset-md-2 col-lg-6 offset-lg-3" aria-labelledby="heading-{{$order -> id}}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="details row" >
                                    <div class="col-12">
                                        <h5>Order code:</h5>
                                        <div>
                                            {{$order -> code}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5>Customer Name:</h5>
                                        <div>
                                            {{$order -> customer_name}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5>Customer Address:</h5>
                                        <div>
                                            {{$order -> customer_address}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5>Customer Phone:</h5>
                                        <div>
                                            {{$order -> customer_phone}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5>Date:</h5>
                                        <div>
                                            {{$order -> date}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5>Status:</h5>
                                        <div>
                                            {{$order -> status}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5>
                                            <u>
                                                Total Price:
                                            </u>
                                        </h5>
                                        <div>
                                            <u>
                                                {{$order -> total_price}}
                                            </u>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

        </div>

    </div>

@endsection
