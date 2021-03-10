@extends('layouts.app')

@section('content')

{{-- -------------------------- COVER IMAGE AND TITLE ------------------------- --}}

    <div class="container-fluid containerPageMenu " id="cart-anna">
        <section class=" row no-gutters">
            <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">
                <div class="align-middle restName text-uppercase">
                    <h1>{{ $restaurant -> company_name }}</h1>
                </div>
            </div>
        </section>
    </div>


{{-- --------------------------RESTAURANT DISH LIST ------------------------- --}}

<div class="container ">
        <section class="row no-gutters ">

            <div class="col-12 order-2 col-lg-6 order-lg-1 text-lighter ">

                <div v-for="dish in dishes" class=" text-silver  my-3 px-2 d-flex justify-content-between align-items-center" style="font-size: 1.25em">
                    @{{ dish.name }}-----------------------@{{ dish.price/100 }} €
                <i class="fas fa-plus text-gold " @click="addDish(dish)"></i>

            </div>

            </div>

            <!--SIDEBAR-->
            <div class="col-12 order-1 col-lg-6 order-lg-2 px-4">
                <div class="row no-gutters sidebar sticky-top p-2">

                    <div class="col-12 generalInfo pb-3 pt-3">
                        <div class="row detailsRest">

                            <!--left-->
                            <div class="col-6 px-2">
                                <div class="col-12 detail">
                                    <span class="text-gold">Address:</span>
                                    <span class="text-silver pr-3">{{ $restaurant -> address }}</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="text-gold">Website:</span>
                                    <span class="text-silver v">{{ $restaurant -> website }}</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="text-gold">Phone:</span>
                                    <span class="text-silver pr-3">{{ $restaurant -> phone_number }}</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="text-gold">Typology:</span>
                                    <span  class="text-silver pr-3">
                                        @foreach ($restaurant -> typologies as $typology)
                                            {{$typology -> name}}@if (!$loop->last), @endif

                                        @endforeach
                                    </span> <!--da inserire-->
                                </div>
                                <div class="col-12 detail">
                                    <span class="text-gold">Delivery:</span>
                                    <span class="text-silver">2,50€</span>
                                </div>
                                <div class="col-12 detail">
                                    <span class="text-gold">Payment:</span>
                                    <span class="text-silver"><i class="fas fa-money-bill-wave"></i>
                                        Cash
                                    </span>
                                    <span class="text-silver">
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                        Credit Card
                                    </span>
                                </div>
                            </div>

                            <!--right-->
                            <div class="col-6 opening">
                                <div class="col-12">
                                    <span class="text-gold">OPENING HOURS:</span>
                                    <p  class="text-silver">{{ $restaurant -> opening_info }}</p>
                                </div>
                            </div>

                        </div>
                    </div> <!--fine generalInfo-->

                    <div class="col-12 cart p-4 " >
                        <div class="dishesSelected d-none d-lg-block text-right">
                            <h4>YOUR ORDER</h4>

                            <div class="itemsOrdered mb-2">

                                <ul v-if="cart.length === 0">
                                    <li class="text-silver  " >
                                        Your cart is empty.
                                    </li>
                                </ul>

                                <ul v-else>
                                    <li v-for="item in cart" class="d-flex justify-content-between pb-2 text-silver">
                                        <div class="inline"> @{{ item.name }}</div>
                                        <div class="inline">Qty: @{{ item.quantity}}</div>
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
