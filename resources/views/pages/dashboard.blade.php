@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="container-fluid center">
            <div class="row">
                <div class="restCover col-sm-12">
                    <h1>{{Auth::user() -> company_name}}</h1>
                </div>

            </div>

            <div class="row">
                <div class="restProfile col-md-12 col-lg-3">
                    <h5>info ristorante</h5>
                    <ul>
                        <li>{{Auth::user() -> email}}</li>
                        <li>{{Auth::user() -> address}}</li>
                        <li>{{Auth::user() -> vat}}</li>
                        <li>{{Auth::user() -> phone_number}}</li>
                        <li>{{Auth::user() -> website}}</li>
                        <li>{{Auth::user() -> opening_info}}</li>
                    </ul>
                </div>

                <div class="restButton col-4 col-lg-3">
                    <img src="https://marigoldmaison.com/wp-content/uploads/Indian-Cuisine.jpg" alt=""><br>
                    <div>
                        <i class="fas fa-utensils"></i>
                        <span>My foods</span>
                    </div>
                </div>
                <div class="restButton col-4 col-lg-3">
                    <img src="https://ae01.alicdn.com/kf/Hcd8da9fa129d41a3a7f7e8435edb094co/MBBITL-Slide-Check-Rack-Kitchen-Bill-Orders-Holder-Ticket-Grabber-Aluminium-Wall-Mountable-Tab-for-Restaurant.jpg" alt=""><br>
                    <div>
                        <i class="fas fa-sort-amount-down-alt"></i>
                        <span>My orders</span>
                    </div>
                    
                    
                </div>
                <div class="restButton col-4 col-lg-3">
                    <img src="https://h5p.org/sites/default/files/styles/medium-logo/public/logos/chart-icon-color.png?itok=kpLTYHHJ" alt=""><br>
                    <div>
                        <i class="fas fa-chart-pie"></i>
                        <span>My stats</span>
                    </div>
                </div>
            </div>

        </div>
    
    </div>

@endsection

