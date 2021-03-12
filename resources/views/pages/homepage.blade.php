@extends('layouts.app')

@section('content')

    <div class="container homeContainer">

        <div class="homeJumbotron row d-flex justify-content-center my-4 ">

            <div class="d-flex justify-content-center img-fluid align-items-center col-lg-12">
                <h1 class="">DELIVEBO</h1>
                    <img class="py-4" src="{{ asset('storage/icons/logo.svg') }}" alt="logo"/>
                <h1 class="">ST</h1>
            </div>

            <h2 class="text-center text-lighter col-lg-12">The luxuriest end fastest food delivery service</h2>
        </div>

        <section  class="homeTypologies row">

            @foreach ($typologies as $typology)

                {{-- <div class="provaTypNames col-12 text-gold" @click="getName({{ $typology -> name }})">PROVA</div> --}}
                <div class="homeTypo col-6 pb-4 col-lg-3" @click="getData({{ $typology -> id }})">

                    <img src="https://d2e5ushqwiltxm.cloudfront.net/wp-content/uploads/sites/140/2020/07/16090452/A659763.jpg" alt="" :class="typologiesIds.includes({{ $typology -> id }}) ? 'typologySelected' : ''">
                    <div class="homeTypName">
                        {{ $typology -> name }}
                    </div>

                </div>

            @endforeach

            {{-- <h4 class="text-gold col-12 pb-3 flex">Typologies selected:</h4>
            <div class="text-gold col-12 pb-3 flex" v-for="typologiesId in typologiesIds">
                @{{ typologiesId }}
            </div> --}}

        </section>


        <div class="row">
           <div class="col-4 offset-4 col-md-2 offset-md-5">
                <div class="btn-gold text-center m-0" @click="deleteFilter()">RESET SEARCH</div>
           </div>
        </div>

        <section class="p-0" v-if="restaurants.length >= 1">

            <h3 class="text-center w-100" v-if="loading">LOADING</h3>

            <div class="row d-flex justify-content-start mb-3 text-white  pt-2 pb-2"  >

                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-4 animate__animated animate__zoomIn animate__fast" v-for="restaurant in restaurants" >

                        <div class="restaurantCard row d-flex flex-column align-items-center justify-content-center text-center p-2 mx-1  ">
                            <div class="col py-4">
                                <h2>
                                    <i class="fa-star" v-for="(star, i) in 3" :class="i+1 <= restaurant.vote_average ? 'text-gold fas' : 'far text-gold'"></i>
                                </h2>
                            </div>

                            <div class="col text-light restaurantName py-4">

                            <div class="col  text-light restaurantName py-4">
                                @{{ restaurant.company_name }}
                                <hr>
                            </div>

                            <div class="col text-silver p-2 ">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil officia perferendis qui voluptatum illo! Temporibus minima atque tempore natus facere.</p>
                            </div>

                            <div class="col text-gold d-flex justify-content-between py-1">

                                <div class="col-4 text-silver d-flex justify-content-between align-items-center">
                                    <i class="far fa-money-bill-alt"></i>
                                    <i class="fa fa-credit-card mx-1" aria-hidden="true"></i>
                                </div>

                                <div class="col-4 text-silver d-flex justify-content-center align-items-center">

                                    <i class="fas fa-euro-sign"></i>

                                </div>

                                <div class="col-4 text-silver d-flex justify-content-center align-items-center ">
                                    <span> Min:20</span>
                                </div>

                            </div>

                            <div class="col text-center my-2">
                                <hr>
{{--                                <a :href="'{{url('menu/restaurant')}}'+ '/' + restaurant.id" class="btn-gold">MENU</a>--}}
                                <a :href="getRestaurantMenu(restaurant.id)" class="btn-gold" @click="selectRestaurant(restaurant.id)">MENU</a>

                            </div>

                        </div>

                    </div>

            </div>

        </section>

    </div>

@endsection


