@extends('layouts.app')

@section('content')



    {{-- -------------------------- COVER IMAGE AND TITLE ------------------------- --}}

<div class="container-fluid px-0 " id="cover-orders">
    <section class=" row no-gutters">
        <div class="cover col-12 d-flex flex-row align-items-center justify-content-center">
            <div class="title text-uppercase">
                <h1>ORDERS</h1>
            </div>
        </div>
    </section>
</div>

{{-- -------------------------- ORDERS LIST ------------------------- --}}
<div class="myorders">

    <div class="container  ">

        @if (session('created'))
            <div class="btn-gold my-2 text-center test-open">
                {{ session('created') }}
            </div>
        @endif

        <div class=" col-12 my-5">
            <h3  class="py-2 text-gold text-lighter bord-b ">
                Check your orders' list:
            </h3>
        </div>


        {{-- ----------------- ACCORDION---------------- --}}

        <div class="accordion" id="accordion">

            @foreach ($orders as $order)

                <div class="row ">
                    <div class="card-header orderCard  bord-lbr col-md-8 offset-md-2 col-lg-6 offset-lg-3 " id="heading-{{$order -> code}}">
                        <h2 class="mb-0 bord-lbr">
                            <button class="btn btn-link btn-block text-left collapsed d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#collapse-{{$order -> code}}" aria-controls="collapse-{{$order -> code}}" aria-expanded="false">
                                <span>
                                    ORDER ID : {{$order -> code}}
                                {{--        dishes: {{ $order -> dishes }}--}}
                                </span>
                                <span>
                                    ORDER DATE : {{ $order -> date }}
                                </span>
                            </button>
                        </h2>
                    </div>

                    <div id="collapse-{{$order -> code}}" class=" orderInfo orderCard collapse card col-md-8 offset-md-2 col-lg-6 offset-lg-3" aria-labelledby="heading-{{$order -> code}}" data-parent="#accordion">
                        <div class="card-body">
                            <div class="details row" >
                                <div class="col-12">
                                    <h5 class="">Order code:</h5>
                                    <div class="">
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
                                    <h5 class="text-gold">

                                            Total Price:

                                    </h5>
                                    <div class="text-gold">

                                            {{$order -> total_price/100}} $

                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5>
                                        Dishes
                                    </h5>
                                </div>
                                <div class="col-6 ">
                                    <div class="text-right">
                                        @foreach($order -> dishes as $dish)
                                        
                                            {{ $dish -> name }}@if (!$loop->last), @endif
                                        
                                        @endforeach
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
