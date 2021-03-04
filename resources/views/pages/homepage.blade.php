@extends('layouts.app')

@section('content')

    <div class="container homeContainer min-vh-100">

        <section class="homeJumbotron row d-flex justify-content-center py-5 px-3    ">

            <div class="d-flex justify-content-center col-lg-12">            
                <h1 class="">DELIVEBO</h1>
                <img  class="" src="{{ asset('storage/icons/logo.svg') }}"/>
                <h1 class="">ST</h1>   
            </div>

            <h2 class="text-center col-lg-12">The luxuriest end fastest food delivery service</h2>
        </section>

        <section  class="homeTypologies row">

            @foreach ($typologies as $typology)
                
                <div 
                class="homeTypo col-12 pb-3  col-sm-6 pb-sm-4 col-lg-3" 
                
                @click="getData({{ $typology -> id }})"
                >
                <!--         -->

                    <img 
                        src="https://d2e5ushqwiltxm.cloudfront.net/wp-content/uploads/sites/140/2020/07/16090452/A659763.jpg" alt=""                        
                    >
                    <div class="homeTypName">
                        {{ $typology -> name }}
                    </div>
                </div>
                
                
            @endforeach



        </section>

        <section  class="homeRestourants row ">

            <h2 class="col-sm-10 offset-sm-1">
                Select the types of food you prefer, and find the restaurants that have them all!
            </h2>


            
        </section>

    </div>

@endsection


