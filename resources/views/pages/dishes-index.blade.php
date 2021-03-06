@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="container-fluid center">
            <div class="row">
                <div class="titleMyFoods col-sm-12 mb-4">
                    <h1>I miei piatti</h1>
                </div>

            </div>

            @if (session('created'))
                <div class="btn-gold mt-2 mb-2 text-center test-open">
                    {{ session('created') }}
                </div>
            @endif

            <div class="row">
                <button class="addDish col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4" >
                    <a href="{{ route('dishes-create') }}">Inserisci nuovo piatto</a>
                </button>
            </div>

            <div class="dishesList accordion" id="accordion">

                @foreach ($dishes as $dish)

                    <div class="row card listItem mb-4">
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
                    </div>

                @endforeach

            </div>

            <div class="row">
                <div class="addDish col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4">
                    Menu pubblico
                </div>
            </div>

        </div>

    </div>

@endsection
