@extends('layouts.app')

@section('content')
   
<div class="omar container-fluid containerPageMenu">
    <section class=" row no-gutters">
        <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">
            <div class="align-middle restName text-uppercase">
                <h1>YOUR CHECKOUT</h1>
            </div>
        </div>
    </section>
    <section class=" row no-gutters">
        <div class=" col-12 d-flex flex-row align-items-center justify-content-center">
            <div class="align-middle text-light text-uppercase">
                <h2>Please check your order before checkout!</h2>
            </div>
        </div>
    </section>

    <section class="container my-4">
        <div class="row">
            <div class="checkoutList col-md-8  col-lg-6">

                <div class="row my-4">
                    <div class="orderItem text-left px-2 col-md-6"> Pizza margherita #1</div>
                    <div class="text-center px-0 col-md-1 offset-md-2"><i class="fas fa-plus"></i></div>
                    <input type="text" name="QTY" class="form px-0 col-md-2 ">
                    <div class="text-center  px-0 col-md-1"><i class="fas fa-minus"></i></div>
                </div>

                
                

            </div>



            {{-- ---- RIGHT SIDE---- --}}
        <div class="cart col-md-4  col-lg-6">

            




        </div>
        




    </section>


        
            
                
                        <div class="row my-3 ">
                            {{-- <div class="col-md-4  text-gold text-light ">
                                <h1> itemme </h1>
                            </div>
                            <div class="col-md-1 text-gold text-light text-center">
                                <h1>+</h1>
                            </div>
                            
                            <input type="text"class="col-md-1 " >
        
                            <div class="col-md-1 text-gold text-light text-center">
                                <h1>-</h1> --}}
                        </div>
                 
                
           



        </div>


            




























            
        </div>    
    </div>
@endsection