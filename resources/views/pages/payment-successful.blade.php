@extends('layouts.app')

@section('content')
<div class="container loginContainer col-sm-12 col-md-8  col-lg-6 paymentOutcome">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="loginCard card-border">
                <div class="card-header text-left  mb-0 text-uppercase">{{ __('Payment Outcome') }}
                
                    <hr class="ml-0">
                </div>

                <div class="card-body d-flex justify-content-between">

                    <h4 class="text-gold">payment-successful</h4>
                    <div><i class="far fa-check-circle fa-2x text-gold"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
