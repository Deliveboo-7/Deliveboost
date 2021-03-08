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
        <div class="col-6  offset-1 col-md-7 offset-md-1"> Pizza margherita #1</div>
        <div class=" cmdCheckout text-center col-1  "><i class="fas fa-plus "></i></div>
        <input type="text" name="qty" class="col-1 ">
        <div class="cmdCheckout text-center col-1  "><i class="fas fa-minus"></i></div>
    </div>
    <div class="row py-2 my-3 orderItem text-gold px-2 ">
        <div class="col-6  offset-1 col-md-7 offset-md-1"> Pizza margherita #1</div>
        <div class=" cmdCheckout text-center col-1  "><i class="fas fa-plus "></i></div>
        <input type="text" name="qty" class="col-1 ">
        <div class="cmdCheckout text-center col-1  "><i class="fas fa-minus"></i></div>
    </div>
    <div class="row py-2 my-3 orderItem text-gold px-2 ">
        <div class="col-6  offset-1 col-md-7 offset-md-1"> Pizza margherita #1</div>
        <div class=" cmdCheckout text-center col-1  "><i class="fas fa-plus "></i></div>
        <input type="text" name="qty" class="col-1 ">
        <div class="cmdCheckout text-center col-1  "><i class="fas fa-minus"></i></div>
    </div>

    
</div>

{{-- 
<div class="  container text-silver" >


    <div class="row itemDish py-2 bordRad" style="min-height:150px">

        <div class="col-8">
            <div class="row h-50 ">
                <div class="col-sm-12 text-gold bord-b py-3">Pizza ai frutti di mare</div>            
            </div>

            <div class="row h-50 ">
                <div class="col-sm-12"><span> pomororo, mozzarella, acciughe, vongole</span></div>
            </div>    
        </div>


        <div class="col-4 clearfix">
            <div class="row h-50 text-center ">
                <div class="col-sm-6 bord-r bord-b py-3 "><h5> 5.50 €</h5></div>
                <div class="col-sm-6  bord-b py-3 text-lighter"> giapponese</div>
            </div>
            <div class="row h-50 text-center">
                <div class="col-sm-6 bord-r text-lighter py-3"><i class="far fa-check-square"></i>Visible</div>
                <div class="col-sm-6 text-lighter py-3"><i class="far fa-edit"></i>Edit</div>
            </div>
        </div>

    </div>
</div> --}}
@endsection