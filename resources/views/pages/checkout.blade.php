@extends('layouts.app')

@section('content')

<div class=" container-fluid containerPageMenu">
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

                <div class="container">
                    <div class="col-12 ">
                      <div class="card bg-light">
                        <div class="card-header">Payment Form</div>
                          <div class="card-body">
                            <div class="alert alert-success" v-if="nonce">
                              Thank you! Your order is confirmed!
                            </div>
                            <div class="alert alert-danger" v-if="error" v-show="!nonce">
                              @{{ error }}
                            </div>  
                            <form id="payment-form"  action="#" v-show="!nonce">
                                
                              <div class="form-group">
                                <label for="name">Your Name</label>
                                <div class="input-group">
                                  <input type="text" id="name" class="form-control" placeholder="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="address">Address for delivery</label>
                                <div class="input-group">
                                  <input type="text" id="address" class="form-control" placeholder="">
                                </div>
                              </div>
                              <!--inserire items carrello-->
                              <div class="form-group">
                                <label for="amount">Amount</label>
                                <div class="input-group">
                                  <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                  <input type="number" id="amount" class="form-control" placeholder="Enter Amount">
                                </div>
                              </div>
                              <hr />
                              <div class="form-group">
                                <label>Credit Card Number</label>
                                <div id="creditCardNumber" class="form-control"></div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-6">
                                    <label>Expire Date</label>
                                    <div id="expireDate" class="form-control"></div>
                                  </div>
                                  <div class="col-6">
                                    <label>CVV</label>
                                    <div id="cvv" class="form-control"></div>
                                  </div>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary btn-block" @click.prevent="payWithCreditCard">Confirm and Pay</button>
                            </form>
                          </div>
                      </div>
                    </div>
                </div>

                
                

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
            
        </div>    
    </div>
@endsection

