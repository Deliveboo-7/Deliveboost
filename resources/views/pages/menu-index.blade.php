@extends('layouts.app')

@section('content')

    <div class="container-fluid containerPageMenu">
        <section class=" row no-gutters">
            <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">
                <div class="align-middle restName text-uppercase">
                    <h1>{{$restaurant -> company_name}}</h1>
                </div>
            </div>
        </section>

        <section class="row no-gutters">
            <div class="col-12 order-2 col-lg-7 order-lg-1 menuList accordion" id="accordion">

                @foreach ($dishes as $dish)

                    <div class="row card listDish mt-4 offset-1 col-10">
                        <div class="card-header " id="heading-{{$dish -> id}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed btn-dish" type="button" data-toggle="collapse" data-target="#collapse-{{$dish -> id}}"  aria-controls="collapse-{{$dish -> id}}" aria-expanded="false">
                                    <span class="item">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        {{$dish -> name}}
                                    </span>
                                    <div>
                                        <span class="price">
                                            {{$dish -> price}} €
                                        </span>
                                        <div class="addToOrder">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </div>  
                                    </div>
                                </button>
                            </h2>
                        </div>
                    
                        <div id="collapse-{{$dish -> id}}" class="collapse col-12" aria-labelledby="heading-{{$dish -> id}}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="desc">{{$dish -> desc}}</div>
                            </div>
                        </div>
                    </div>

                @endforeach                        

            </div> <!--fine accordion-->

            <div class="col-12 order-1 col-lg-5 order-lg-2 container-sidebar">
                <div class="row no-gutters sidebar sticky-top p-2">
                    
                    <div class="col-12 generalInfo p-3">
                        <div class="row detailsRest">

                            <!--left-->
                            <div class="col-6">
                                <div class="col-12 detail">
                                    <span class="detailTitle">Address:</span>
                                    <span>{{$restaurant -> address}}</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="detailTitle">Website:</span>
                                    <span>{{$restaurant -> website}}</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="detailTitle">Phone:</span>
                                    <span>{{$restaurant -> phone_number}}</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="detailTitle">Typology:</span>
                                    <span>
                                        @foreach ($restaurant -> typologies as $typology)
                                            {{$typology -> name}}

                                            @if (!$loop->last)
                                                ,
                                            @endif

                                        @endforeach     
                                    </span> <!--da inserire-->
                                </div>
                                <div class="col-12 detail">
                                    <span class="detailTitle">Delivery:</span>
                                    <span>2,50€</span> 
                                </div> 
                                <div class="col-12 detail">
                                    <span class="detailTitle">Payment:</span>
                                    <span><i class="fas fa-money-bill-wave"></i>
                                        Cash
                                    </span>
                                    <span>
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                        Credit Card
                                    </span>
                                </div>            
                            </div>

                            <!--right-->
                            <div class="col-6 opening">
                                <div class="col-12">
                                    <span class="detailTitle">OPENING HOURS:</span>
                                    <p>{{$restaurant -> opening_info}}</p>
                                </div>    
                            </div>
           
                        </div>
                    </div> <!--fine generalInfo-->

                    <div class="col-12 cart p-4 ">
                        <div class="dishesSelected d-none d-lg-block">
                            <h4>YOUR ORDER</h4>

                            <div class="itemsOrdered mb-2">
                                <ul>
                                    <li class="d-flex justify-content-between pb-2">
                                        <span>pizza margherita</span>
                                        <span class="numbItem">5</span>
                                    </li>
                                    <li class="d-flex justify-content-between pb-2">
                                        <span>pizza ciao</span>
                                        <span class="numbItem">2</span>
                                    </li>
                                    <li class="d-flex justify-content-between pb-2">
                                        <span>carbonara</span>
                                        <span class="numbItem">4</span>
                                    </li>
                                    <li class="d-flex justify-content-between pb-2">
                                        <span>carbonara</span>
                                        <span class="numbItem">4</span>
                                    </li>
                                    <li class="d-flex justify-content-between pb-2">
                                        <span>carbonara</span>
                                        <span class="numbItem">4</span>
                                    </li>
                                    <li class="d-flex justify-content-between pb-2">
                                        <span>carbonara</span>
                                        <span class="numbItem">4</span>
                                    </li>
                                    <li class="d-flex justify-content-between pb-2">
                                        <span>carbonara</span>
                                        <span class="numbItem">4</span>
                                    </li>
                                    <li class="d-flex justify-content-between pb-2">
                                        <span>carbonara</span>
                                        <span class="numbItem">4</span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <button type="button" class="btn btn-checkout btn-lg btn-block d-flex justify-content-around">
                            <span class="d-block d-lg-none">Items: ...</span>
                            <span>CHECKOUT</span>
                            <span>Total: 20,50€ </span>
                        </button>
                    </div>
                </div>    
            </div>
        </section>
        

    </div>


@endsection