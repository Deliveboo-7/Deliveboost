@extends('layouts.app')

@section('content')

    {{-- <div class=" debug container-fluid"> --}}

        <div class="container-fluid containerPageMenu">
            <div class="row no-gutters">
                <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">
    
                    <div class="align-middle restName text-uppercase">
                        <h1>{{Auth::user() -> company_name}} - These are your dishes</h1>
                    </div>
    
                </div>
    
            </div>
    
        </div>
    

        <div class="dishes-index  container-fluid ">
            {{-- <div class="row cover ">
                <div class=" col stripe text-uppercase d-flex flex-column justify-content-center ">
                   
                    <h1 class="">These are your dishes</h1>
                    
                </div>

            </div> --}}

            @if (session('created'))
                <div class="btn-gold mt-2 mb-2 text-center test-open">
                    {{ session('created') }}
                </div>
            @endif

            <div class="row pt-5">
                <button class="addDish btn-gold col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4" >
                    <a href="{{ route('dishes-create') }}">Inserisci nuovo piatto</a>
                </button>
            </div>

            <div class="dishesList accordion" id="accordion">

                @foreach ($dishes as $dish)
                
                    <div class="  container text-silver my-3" >

                        <div class="row itemDish py-2 bordRad" style="min-height:150px">
                    
                            <div class="col-8">
                                <div class="row h-50 ">
                                    <div class="col-sm-12 text-gold bord-b py-3">{{$dish -> name}}</div>            
                                </div>
                    
                                <div class="row h-50 ">
                                    <div class="col-sm-12"><span> {{$dish -> desc}}</span></div>
                                </div>    
                            </div>
                    
                    
                            <div class="col-4 clearfix">
                                <div class="row h-50 text-center ">
                                    <div class="col-sm-6 bord-r bord-b py-3 "><h5> 5.50 €</h5></div>
                                    <div class="col-sm-6  bord-b py-3 text-lighter"> giapponese</div>
                                </div>
                                <div class="row h-50 text-center">
                                    <div class="col-sm-6 bord-r text-lighter py-3"><i class="far fa-check-square"></i>Visible{{$dish -> visible}}</div>
                                    <a href="{{ route('dishes-edit', $dish -> id) }}" 
                                        type="button" 
                                        class="col-sm-6 text-lighter text-gold py-3 btn-edit">
                                            <i class="far fa-edit"></i>
                                            Edit
                                    </a>
                                </div>
                            </div>
                    
                        </div>
                    </div>


   


                    {{-- <div class="row card listItem mb-4">
                        <div class="card-header col-md-8 offset-md-2 col-lg-6 offset-lg-3" id="heading-{{$dish -> id}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-{{$dish -> id}}"  aria-controls="collapse-{{$dish -> id}}" aria-expanded="false">
                                    {{$dish -> name}}
                                </button>
                            </h2>
                        </div>

                        <div id="collapse-{{$dish -> id}}" class="collapse col-md-8 offset-md-2 col-lg-6 offset-lg-3" aria-labelledby="heading-{{$dish -> id}}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="desc">{{$dish -> desc}}</div>
                                <div class="details" >

                                    <div class="price">
                                        <h5>Price:</h5>
                                        <div>{{$dish -> price}}</div>
                                    </div>

                                    <div class="type">
                                        <h5>Type:</h5>
                                        <div>PIZZA</div> <!--DA INSERIRE-->
                                    </div>

                                    <div class="visible">
                                        <h5>Visible:</h5>
                                        <div>{{$dish -> visible}}</div>
                                    </div>

                                </div>
                                <a href="{{ route('dishes-edit', $dish -> id) }}" type="button" class="btn btn-dark edit">Edit</a>
                            </div>
                        </div>
                    </div> --}}

                @endforeach

            </div>

            {{-- <div class="row">
                <div class="addDish btn-gold col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4 ">
                    Menu pubblico
                </div>
            </div> --}}


            <div class="row pt-4">
                <button class="addDish btn-gold col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4" >
                    <a href="">Menu pubblico</a>
                </button>
            </div>


        </div>

    {{-- </div> --}}

@endsection
