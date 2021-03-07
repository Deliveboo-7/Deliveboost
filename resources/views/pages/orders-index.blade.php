@extends('layouts.app')

@section('content')

    <div class="myorders">

        <div class="container-fluid containerPageMenu">
            <div class="row no-gutters">
                <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">
    
                    <div class="align-middle restName text-uppercase">
                        <h1>{{Auth::user() -> company_name}} - My Orders</h1>
                    </div>
    
                </div>
    
            </div>
    
        </div>
    

        <div class="container-fluid center">
            {{-- <div class="row">
                <div class="titleMyFoods col-sm-12 mb-4">
                    <h1>I miei piatti</h1>
                </div>

            </div> --}}

            @if (session('created'))
                <div class="btn-gold mt-2 mb-2 text-center test-open">
                    {{ session('created') }}
                </div>
            @endif

            {{-- <div class="row">
                <button class="addDish col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4 btn-gold" >
                    <a href="{{ route('dishes-create') }}">Inserisci nuovo piatto</a>
                </button>
            </div> --}}

            <div class="accordion" id="accordion">
                <p style="font-size: 2em; color: red;">tutti gli ordini già in database, non quelli dell'user</p>

                @foreach ($orders as $order)

                    <div class="row card mb-4">
                        <div class="card-header col-md-8 offset-md-2 col-lg-6 offset-lg-3" id="heading-{{$order -> id}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-{{$order -> id}}"  aria-controls="collapse-{{$order -> id}}" aria-expanded="false">
                                    order id : {{$order -> id}}
                                </button>
                            </h2>
                        </div>

                        <div id="collapse-{{$order -> id}}" class="collapse col-md-8 offset-md-2 col-lg-6 offset-lg-3" aria-labelledby="heading-{{$order -> id}}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="details row" >
                                    <div class="col-12">
                                        <h5>order code:</h5>
                                        <div>{{$order -> code}}</div>
                                    </div>


                                    <div class="col-12">
                                        <h5>customer_name:</h5>
                                        <div>{{$order -> customer_name}}</div>
                                    </div>
                                    <div class="col-12">
                                        <h5>customer_address:</h5>
                                        <div>{{$order -> customer_address}}</div>
                                    </div>
                                    <div class="col-12">
                                        <h5>customer_phone:</h5>
                                        <div>{{$order -> customer_phone}}</div>
                                    </div>
                                    <div class="col-12">
                                        <h5>date:</h5>
                                        <div>{{$order -> date}}</div>
                                    </div>
                                    <div class="col-12">
                                        <h5>status:</h5>
                                        <div>{{$order -> status}}</div>
                                    </div>
                                    <div class="col-12">
                                        <h5>Total Price:</h5>
                                        <div>{{$order -> total_price}}</div>
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
