@extends('layouts.app')

@section('content')

{{-- -------------------------- COVER IMAGE AND TITLE ------------------------- --}}

        <div class="container-fluid p-0" id="cover-dishes">
            <div class="row no-gutters">
                <div class="cover col-12 d-flex flex-row align-items-center justify-content-center">
                    <div class="title text-uppercase">
                        <h1>my dishes</h1>
                        {{-- {{Auth::user() -> company_name}} -  --}}
                    </div>   
                </div>   
            </div>   
        </div>
    
{{-- -------------------------- MAIN BUTTONS ------------------------- --}}
        <div class=" container ">

            @if (session('created'))
                <div class="btn-gold my-2 text-center">
                    {{ session('created') }}
                </div>
            @endif

            <div class="row pt-5">
                <button class=" btn-gold col-2 offset-3 mb-4" >
                    <a href="{{ route('dishes-create') }}">New dish</a>
                </button>

                <button class="btn-gold col-2 offset-2 mb-4" >
                    <a href="">Public menu</a>
                </button>
            </div>
        </div>
            

        {{-- --------------------------RESTAURANT DISH LIST ------------------------- --}}

            <div class="container "> 

                <div class="row mt-4">
                    <div class="col-12 p-2">

                        {{-- --------------------  LABELS ------------------------- --}}
                        
                        <div  class="row text-gold  mb-4 p-2 bord-b">
            
                            <div class="col-5 " style="font-size: 1em;">
                                <h4 class="text-lighter">Menu</h4>
                            </div>         
                            
                            <div class="col-2   col-md-2 text-gold text-center">
                                <h4 class="text-lighter">Price</h4>
                            </div>
            
                            <div class="col-2 text-center text-gold p-0">
                                <h4 class="text-lighter">Visible</h4>            
                            </div>

                            <div class="col-3 text-center text-gold p-0">
                                <h4 class="text-lighter">Edit</h4>            
                            </div>

                        </div>

                        {{-- -------------------- DISHES ------------------------- --}}
                        @foreach ($dishes as $dish)

                            <div class="row text-silver my-2 p-2 bord-lbr">
                
                                <div class="col-5 " style="font-size: 1em;">
                                    {{ $dish -> name }}
                                </div>
                
                                
                                <div class="col-2 col-md-2 text-center">
                                    {{ $dish -> price/100 }} €
                                </div>

                                <div class="col-2 text-center text-gold p-0">
                                    
                                    @if ($dish ->visible)
                                        <i class="fas fa-check-square"></i>  
                                    @else
                                        <i class="fas fa-times"></i> 
                                    @endif

                                </div>

                                <a href="{{ route('dishes-edit', $dish -> id) }}" type="button" class="col-1 offset-md-1 cmdCheckout text-center text-gold">                              
                                    <i class="far fa-edit"></i>                                            
                                </a>
                            
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12 text-lightgrey" style="font-size: 1em;">
                                            <span>{{ $dish -> desc }} </span>
                                        </div>
                                    </div>    
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>

@endsection
