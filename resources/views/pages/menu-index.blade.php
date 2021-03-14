@extends('layouts.app')

@section('content')

{{-- -------------------------- COVER IMAGE AND TITLE ------------------------- --}}

    <div class="container-fluid px-0 " id="cover-menu">
        <section class=" row no-gutters">
            <div class="cover col-12 d-flex flex-row align-items-center justify-content-center">
                <div class="title text-uppercase">
                    <h1>{{ $restaurant -> company_name }}</h1>
                </div>
            </div>
        </section>
    </div>


{{-- --------------------------RESTAURANT DISH LIST ------------------------- --}}

<div class="container"> 

    <div class="row mt-4">
        
        <div class="col-12 order-2  order-lg-1 p-3 ">

            <div  class="row text-gold  mb-4 p-2 bord-b">

                <div class="col-4 col-lg-2" style="font-size: 1em;">
                    <h4 class="text-lighter">Menu</h4>
                </div>

                <div class="col-3 offset-3 col-lg-2 offset-lg-0 text-gold text-right">
                    <h4 class="text-lighter">Price</h4>
                </div>

                <div class="col-2 col-lg-1 offset-lg-0 text-right text-gold p-0">
                    <h4 class="text-lighter">Add</h4>            
                </div>

            </div>
        </div>
        
        
        <div class="col-12 order-2 col-lg-5 order-lg-2  px-4 dishlist">

            <div v-for="dish in dishes" v-show="dish.visible"  class="row text-silver my-2 p-2 bord-lbr">

                    <div class="col-7 " style="font-size: 1em;">
                        @{{ dish.name }}
                    </div>

                    
                    <div class="col-3   col-md-3 text-right">
                        @{{ dish.price/100 }} €
                    </div>

                    <div class="col-1 offset-1 offset-sm-1 cmdCheckout text-center text-gold p-0" @click="addDish(dish)">
                        <i class="fas fa-plus " ></i>                   
                    </div>


                    <div class="col-8">
                        <div class="row">
                            <div class="col-12 text-lightgrey" style="font-size: 1em;">
                                <span>@{{ dish.desc }} </span>
                            </div>
                        </div>    
                    </div>

                



            </div>

        </div>

        {{-- --------------------------RESTAURANT INFO------------------------- --}}

        <div class="col-12 order-1 col-lg-6 offset-lg-1  order-lg-3 bord-b p-2 ">
            <div class="row">
                <div class="col-12">
                    <div class="row p-0">
                        <!-- ------ left ------ -->
                        <div class="col-6">
                            <div class="col-12 p-2">
                                <div class="text-gold">Address:</div>
                                <div class="text-silver text-wrap">{{ $restaurant -> address }}</div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="text-gold">Website:</div>
                                <div class="text-silver text-wrap">{{ $restaurant -> website }}</div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="text-gold">Phone:</div>
                                <div class="text-silver">{{ $restaurant -> phone_number }}</div>
                            </div>
                            
                        </div>
                        <!-- ------ right ------ -->
                        <div class="col-6 bord-l  ">
                            <div class="row">

                                <div class="col-12 p-2">
                                    <div class="text-gold">Typology:</div>
                                    <div  class="text-silver">
                                        @foreach ($restaurant -> typologies as $typology)
                                            {{$typology -> name}}
                                                @if (!$loop->last),
                                                @endif
                                        @endforeach
                                    </div> 
                                </div>


                                <div class="col-12 p-2">
                                    <div class="text-gold">Payment:</div>
                                    <div class="text-silver text-lighter text-left">
                                        <span class="">
                                            <i class="far fa-money-bill-alt"></i>
                                            Cash
                                        </span>
                                        <span class="">
                                            <i class="far fa-credit-card" aria-hidden="true">  
                                            Credit Card</i>                                       
                                        </span>
                                    </div>   
                                </div>

                                <div class="col-12 p-2">
                                    <div class="text-gold">Delivery:</div>
                                    <div class="text-silver">2,50€</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row my-4">

                        <div class="col-6">
                            <span class="text-gold">OPENING HOURS:                            
                        </div>

                        <div class="col-6">                            
                            <p  class="text-silver">{{ $restaurant -> opening_info }}</p></span>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        {{-- ------------  CART UPDATING LIVE --------- --}}

        <div class="col-12 col-lg-6 offset-lg-6 order-4 py-3" >
            <div class="dishesSelected d-none d-lg-block">
                <h4 class="text-gold text-lighter text-center">YOUR ORDER</h4>

                <div class="itemsOrdered">
                    <div class="d-flex justify-content-between text-gold bord-b my-4">
                        <div class="inline">Item </div>
                        <div class="inline">
                            <span class="mx-3">€ </span>
                            <span class="mx-3">Qty </span>                              
                        </div>
                    </div>

                    <ul v-if="cart.length === 0">
                        <li class="text-silver text-center">
                            Your cart is empty.
                        </li>
                    </ul>

                    <ul v-else>
                        <li v-for="item in cart" class="d-flex justify-content-between text-silver bord-b">

                            <div class="inline"> @{{ item.name }}</div>
                            <div class="inline">
                                <span class="mr-5"> @{{ item.price/100}}</span>
                                <span class="mr-2"> @{{ item.quantity}}</span>                              
                            </div>

                        </li>
                    </ul>

                </div>
            </div>

            <div class="row text-silver bord-b p-1">

                <div class="col-10 ">
                    Items in cart:
                </div>

                <div class="col-2  text-right">
                    @{{ totalItems }}
                </div>
            </div>


            {{-- --------------------------BUTTON CHECKOUT------------------------- --}}
            
            <a href="{{ route('checkout') }}" @click="saveCart()" class="text-decoration-none">
                <button type="button" 
                class=" order-3 btn btn-checkout btn-block d-flex justify-content-around my-3">
                    <span>CHECKOUT</span> 
                    <label> @{{ finalPrice/100 }} € </label>
                </button>
            </a>

        </div>
    </div>
</div>

@endsection
