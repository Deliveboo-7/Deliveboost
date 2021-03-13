@extends('layouts.app')

@section('content')


{{-- -------------------------- COVER IMAGE AND TITLE ------------------------- --}}

<div class="container-fluid p-0" id="cover-checkout">
  <div class="row">
      <div class="cover col-12 d-flex flex-row align-items-center justify-content-center">
          <div class="title text-uppercase">
              <h1>confirm your order</h1>
          </div>
      </div>
  </div>
</div>

    {{-- --------------------------PAYMENT FORM------------------------- --}}

  <div class="container-fluid">
    <div class="row">
      <div class="col-12  col-sm-10 offset-sm-1 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
        <div class="card paymentForm my-3">

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

{{-- ---------------------------------------------------------------------- --}}
            <form id="payment-form" v-show="!nonce" method="POST" action="{{ url('/payment-result') }}">
                @csrf
                @method('POST')

                <label for="name" class="text-gold">Your Name</label>
                <input type="text" id="name" name="customer_name" class="form-control" placeholder="Type your name" v-model="customerName">

                <label for="address" class="text-gold mt-2">Address for delivery</label>
                <input type="text" id="address" class="form-control" name="customer_address" placeholder="Type the adress for delivery" v-model="address">

                <label for="customer_phone" class="text-gold mt-2">Phone number</label>
                <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="Type your phone number" v-model="phone" >

                <input id="code" name="code" hidden>

                <input id="status" name="status" hidden>

                <input id="date" name="date" hidden>

                <input type="text" name="dishes" hidden :value="selectedDishes">

                <div class="dish-list-chk py-2">

                  <div class=" m-0 text-silver text-center bord-b p-2" v-if="checkout.length === 0"> YOUR CART IS EMPTY !</div>

                    <div class="row m-0  bord-b p-2" v-for="item in checkout">
                    {{-- <div class="col-6 col-sm-4 offset-sm-2 text-silver orderItem"> </div> --}}
                    <input type="text" name="items[]" class="form-control col-6" placeholder="" :value= "item.name" readonly>
                    <input type="text" name="items[]" class="form-control text-right col-2" placeholder="" :value="item.price/100 +'€'" readonly>
                    <div @click="removeQty(item)" class="cmdCheckout text-center col-1 p-2 "><i class="fas fa-minus"></i></div>
                    <input type="text" name="qty[]" class="form-control col-1 text-center" placeholder="" :value="item.quantity" readonly>
                    <div @click="addQty(item)" class=" cmdCheckout text-center col-1 p-2 "><i class="fas fa-plus "></i></div>  
                    {{-- <label for="qty" class="col-1 text-center text-silver orderItem"> @{{item.quantity}}  </label> --}}

                    </div>

                </div>

                    {{-- <div class="row py-2 my-3 px-2" v-for="item in checkout">
                        <div class="col-6 offset-2 col-sm-4 offset-sm-2 text-silver orderItem"> </div>
                        <input type="text" name="items[]" class="form-control" placeholder="" :value="item.name" readonly>
                        <div @click="removeQty(item)" class="btn-gold t text-gold text-center col-1  "><i class="fas fa-minus"></i></div>
                        <input type="text" name="qty[]" class="form-control" placeholder="" :value="item.quantity" readonly>

                        <div @click="addQty(item)" class=" btn-gold text-gold text-center col-1  "><i class="fas fa-plus "></i></div>
                    </div> --}}
                <label for="total_price" class="text-gold my-2">Amount:</label>
                <input name="total_price" class="amount col-8 text-left my-2" :value="finalPrice/100 +'€'" readonly>

                <input type="text" name="selectedRestaurant" :value="sendMailRestaurant" hidden>
                <label class="text-gold col-12 p-0">Credit Card Number</label>
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

              <input id="nonce" name="payment_method_nonce" hidden>
              <button type="submit" class="btn-gold btn-block mt-4"  @click.prevent="payWithCreditCard()">Confirm and Pay</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

