@extends('layouts.app')

@section('content')

    <div class="container-fluid homeContainer">

        <section class="homeJumbotron row">
            <h1 class="col-sm-10 offset-sm-1">DELIVEBO<img src="storage/icons/logo.svg"/>ST</h1>
            <h2 class="col-sm-10 offset-sm-1">The luxuriest end fastest food delivery service</h2>
        </section>

        <section  class="homeTypologies row">

            @foreach ($typologies as $typology)
                
                <div 
                class="homeTypo" 
                @click="getData({{ $typology -> id }})"
                >
                    <img 
                        src="https://d2e5ushqwiltxm.cloudfront.net/wp-content/uploads/sites/140/2020/07/16090452/A659763.jpg" alt=""                        
                    >
                    <div class="homeTypName">
                        <span>
                            {{ $typology -> id }}
                        </span>
                    </div>
                </div>
                
                
            @endforeach



        </section>

        <section  class="homeRestourants row">

            <h2 class="col-sm-10 offset-sm-1">
                Select the types of food you prefer, and find the restaurants that have them all!
            </h2>


            
        </section>

    </div>

@endsection


