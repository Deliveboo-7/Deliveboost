@extends('layouts.app')

@section('content')

<div class=" container-fluid containerPageMenu">
    <section class=" row no-gutters">
        <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">
            <div class="align-middle restName text-uppercase">
                <h1>YOUR CART</h1>
            </div>
        </div>
    </section>
</div>

<div class="container ">

    <div class=" row my-4 text-silver">
        <div class=" col-12 text-center text-lighter">
            <span>Please check your order before checkout!</span>                
        </div>
    </div>

    <div class="row py-2 my-3 orderItem text-gold px-2 ">
        <div class="col-6 col-md-7 offset-md-1"> Pizza margherita #1</div>
        <div class=" text-center col-2 col-md-1"><i class="fas fa-plus "></i></div>
        <input type="text" name="qty" class="col-1 col-md-1">
        <div class="text-center col-2 col-md-1"><i class="fas fa-minus"></i></div>
    </div>

    <div class="row py-2 my-3 orderItem text-gold px-2 ">
        <div class="col-6 col-md-7 offset-md-1"> Pizza margherita #1</div>
        <div class=" text-center col-2 col-md-1"><i class="fas fa-plus "></i></div>
        <input type="text" name="qty" class="col-1 col-md-1">
        <div class="text-center col-2 col-md-1"><i class="fas fa-minus"></i></div>
    </div>

    <div class="row  py-2 my-3 orderItem text-gold px-2 ">
        <div class="col-6 col-md-7 offset-md-1"> Pizza margherita #1</div>
        <div class=" text-center col-2 col-md-1"><i class="fas fa-plus "></i></div>
        <input type="text" name="qty" class="col-1 col-md-1">
        <div class="text-center col-2 col-md-1"><i class="fas fa-minus"></i></div>
    </div>


</div>

@endsection