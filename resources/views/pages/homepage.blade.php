@extends('layouts.app')

@section('content')

    <div class="homeContainer container-fluid">

        <section class="homeJumbotron col-xs-12">
            <h1>DELIVEBOOST</h1>
            <h2>The luxuriest end fastest food delivery service</h2>
        </section>

        <section  class="homeTypologies col-xs-12">

            @foreach ($typologies as $typology)
                
                <div 
                class="homeTypo col-xs-12" 
                @click="getData({{ $typology -> id }})"
                >
                    <img 
                        src="https://img.webmd.com/dtmcms/live/webmd/consumer_assets/site_images/article_thumbnails/quizzes/fast_food_smarts_rmq/650x350_fast_food_smarts_rmq.jpg" alt=""
                        
                    >
                    <div class="homeTypName">
                        <span>
                            {{ $typology -> id }}
                        </span>
                    </div>
                </div>
                
                
            @endforeach



        </section>

        <section  class="homeRestourants  col-xs-12">

            <h2>
                Select the types of food you prefer, and find the restaurants that have them all!
            </h2>


            
        </section>

    </div>

@endsection


