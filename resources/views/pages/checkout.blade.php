@extends('layouts.app')

@section('content')


{{-- -------------------------- COVER IMAGE AND TITLE ------------------------- --}}
<div class="container-fluid containerPageMenu">

  <section class=" row no-gutters">
      <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">
        <div class="align-middle restName text-uppercase">
          <h1>YOUR CHECKOUT</h1>
        </div>
      </div>
  </section>

    <div class=" row my-4 text-silver">
      <div class=" col-12 text-center text-lighter">
          <span style="font-size: 1.5em">Please check your order before checkout!</span>     
      </div>
    </div>
</div>



  {{-- -------------------------- CHECKOUT LIST ------------------------- --}}
{{-- 
  <div class="container ">
    <div class="row py-2 my-3 px-2" v-for="item in checkout">
      <div class="col-6 offset-2 col-sm-4 offset-sm-2 text-silver orderItem"> </div>
      <input type="text" id="itemName" class="form-control" placeholder="" :value="item.name" readonly>
      <div @click="removeQty(item)" class="btn-gold t text-gold text-center col-1  "><i class="fas fa-minus"></i></div>
      <input type="text" id="itemName" class="form-control" placeholder="" :value="item.quantity" readonly>
      {{-- <label for="qty" class="col-1 text-center text-silver orderItem"> @{{item.quantity}}  </label> --}}
    {{--   <div @click="addQty(item)" class=" btn-gold text-gold text-center col-1  "><i class="fas fa-plus "></i></div>  
    </div>
  </div> 
  --}}
  
  
  
    {{-- --------------------------PAYMENT FORM------------------------- --}}
  
  <div class="container">
    <div class="row">
      <div class="col-10 offset-1 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
        <div class="card paymentForm">
  
          <div class="card-header">
            Payment Form
          </div>
  
          <div class="card-body">
            <div class="alert alert-success" v-if="nonce">
              Thank you! Your order is confirmed!
            </div>
            <div class="alert alert-danger" v-if="error" v-show="!nonce">
              @{{ error }}
            </div>
  
            <form id="payment-form" v-show="!nonce" method="POST" action="{{ url('/success')}}">
                @csrf
                @method('POST')
  
                <label for="name" class="text-gold">Your Name</label>
                <input type="text" id="name" class="form-control" placeholder="">
  
                <label for="address" class="text-gold mt-2">Address for delivery</label>
                <input type="text" id="address" class="form-control" placeholder="">
  
  
  
                <div class="my-3">
                  <div class="row py-2 my-3 px-2" v-for="item in checkout">
                    <div class="col-6 offset-2 col-sm-4 offset-sm-2 text-silver orderItem"> </div>
                    <input type="text" name="items[]" class="form-control" placeholder="" :value="item.name" readonly>
                    <div @click="removeQty(item)" class="btn-gold t text-gold text-center col-1  "><i class="fas fa-minus"></i></div>
                    <input type="text" name="qty[]" class="form-control" placeholder="" :value="item.quantity" readonly>
                    {{-- <label for="qty" class="col-1 text-center text-silver orderItem"> @{{item.quantity}}  </label> --}}
                    <div @click="addQty(item)" class=" btn-gold text-gold text-center col-1  "><i class="fas fa-plus "></i></div>  
                  </div>
                  <label for="amount" class="text-gold my-2">Amount:</label>
                  <input for="amount" name="amount" class=" col-4 text-right my-2" :value="finalPrice/100" readonly> 
                </div>
  
  
                
  
                <label class="text-gold">Credit Card Number</label>
                <div id="creditCardNumber" class="form-control"></div>
  
                <div class="row my-2">
                  <div class="col-6">
                    <label class="text-gold">Expire Date</label>
                    <div id="expireDate" class="form-control"></div>
                  </div>
                  <div class="col-6">
                    <label class="text-gold">CVV</label>
                    <div id="cvv" class="form-control"></div>
                  </div>
                </div>
              
              <input id="nonce" name="payment_method_nonce" type="hidden"/>
              <button type="submit" class="btn-gold btn-block mt-4"  @click.prevent="payWithCreditCard()">Confirm and Pay</button>
            </form>
          </div>
        </div>
      </div>   
    </div>
  </div>
  

  {{-- -------------------------- CHECKOUT LIST ------------------------- --}}

{{-- <div class="container ">
  <div class="row py-2 my-3 px-2" v-for="item in checkout">
    <div class="col-6 offset-2 col-sm-4 offset-sm-2 text-silver orderItem"> @{{item.name}}</div>
    <div @click="removeQty(item)" class="btn-gold t text-gold text-center col-1  "><i class="fas fa-minus"></i></div>
    <label for="qty" class="col-1 text-center text-silver orderItem"> @{{item.quantity}}  </label>
    <div @click="addQty(item)" class=" btn-gold text-gold text-center col-1  "><i class="fas fa-plus "></i></div>  
  </div>
</div>
 --}}



  {{-- --------------------------PAYMENT FORM------------------------- --}}
{{-- 
<div class="container">
  <div class="row">
    <div class="col-10 offset-1 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
      <div class="card paymentForm">

        <div class="card-header">
          Payment Form
        </div>

        <div class="card-body">
          <div class="alert alert-success" v-if="nonce">
            Thank you! Your order is confirmed!
          </div>
          <div class="alert alert-danger" v-if="error" v-show="!nonce">
            @{{ error }}
          </div>

          <form id="payment-form" v-show="!nonce" method="POST" action="{{ url('/success')}}">
              @csrf
              @method('POST')

              <label for="name" class="text-gold">Your Name</label>
              <input type="text" id="name" class="form-control" placeholder="">

              <label for="address" class="text-gold mt-2">Address for delivery</label>
              <input type="text" id="address" class="form-control" placeholder="">



              <div class="my-3">
                <label for="amount" class="text-gold my-2">Amount:</label>
                <label for="amount" class=" col-4 text-right my-2"> @{{finalPrice/100}} € </label> 
              </div>


              

              <label class="text-gold">Credit Card Number</label>
              <div id="creditCardNumber" class="form-control"></div>

              <div class="row my-2">
                <div class="col-6">
                  <label class="text-gold">Expire Date</label>
                  <div id="expireDate" class="form-control"></div>
                </div>
                <div class="col-6">
                  <label class="text-gold">CVV</label>
                  <div id="cvv" class="form-control"></div>
                </div>
              </div>
            
            <input id="nonce" name="payment_method_nonce" type="hidden"/>
            <button type="submit" class="btn-gold btn-block mt-4"  @click.prevent="payWithCreditCard()">Confirm and Pay</button>
          </form>
        </div>
      </div>
    </div>   
  </div>
</div> --}}



@endsection

