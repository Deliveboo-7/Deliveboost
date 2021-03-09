@extends('layouts.app')

@section('content')

    <div class="container-fluid containerPageMenu " id="cart-anna">
        <section class=" row no-gutters">
            <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">
                <div class="align-middle restName text-uppercase">
                    <h1>{{ $restaurant -> company_name }}</h1>
                </div>
            </div>
        </section>

        <section class="row no-gutters">
            <div class="col-12 order-2 col-lg-7 order-lg-1 menuList accordion" id="accordion">

                <ul>
                    <li v-for="dish in dishes" class="text-gold" >
                        [@{{ dish.id }}] @{{ dish.name }}  - @{{ dish.price/100 }} € 
                        <i class="fas fa-plus" @click="addDish(dish)"></i>
                    </li>
                </ul>
            </div>

            <!--SIDEBAR-->
            <div class="col-12 order-1 col-lg-5 order-lg-2 container-sidebar">
                <div class="row no-gutters sidebar sticky-top p-2">

                    <div class="col-12 generalInfo pb-3 pt-3">
                        <div class="row detailsRest">

                            <!--left-->
                            <div class="col-6 px-2">
                                <div class="col-12 detail">
                                    <span class="detailTitle">Address:</span>
                                    <span>{{ $restaurant -> address }}</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="detailTitle">Website:</span>
                                    <span>{{ $restaurant -> website }}</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="detailTitle">Phone:</span>
                                    <span>{{ $restaurant -> phone_number }}</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="detailTitle">Typology:</span>
                                    <span>
                                        @foreach ($restaurant -> typologies as $typology)
                                            {{$typology -> name}}@if (!$loop->last), @endif

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
                                    <p>{{ $restaurant -> opening_info }}</p>
                                </div>
                            </div>

                        </div>
                    </div> <!--fine generalInfo-->

                    <div class="col-12 cart p-4 " >
                        <div class="dishesSelected d-none d-lg-block">
                            <h4>YOUR ORDER</h4>

                            <div class="itemsOrdered mb-2">

                                <ul v-if="cart.length === 0">
                                    <li >
                                        vuoto
                                    </li>
                                </ul>

                                <ul v-else>
                                   <li v-for="item in cart" class="d-flex justify-content-between pb-2">
                                       
                                       <span >[@{{ item.id }}] @{{ item.name }} --> @{{ item.quantity}}</span>
                                       
                                   </li>
                               </ul>

                            </div>

                        </div>
                        <button type="button" class="btn btn-checkout btn-lg btn-block d-flex justify-content-around">
                            <span class="d-block d-lg-none">Items: ...</span>
                            <a href="{{ route('checkout') }}" @click="saveCart()"><span>CHECKOUT</span> </a>
                            <label> @{{ finalPrice/100 }} </label>
                        </button>
                    </div>
                </div>
            </div>
        </section>


    </div>


@endsection
