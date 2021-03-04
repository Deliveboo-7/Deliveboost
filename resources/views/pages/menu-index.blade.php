@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <section class=" row">
            <div class="coverRist col-12 d-flex flex-row align-items-center justify-content-center">
                <div class="align-middle restName">
                    <h1>RISTORANTE PIZZERIA DA PINO</h1>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 order-2 col-lg-8 order-lg-1 menuList accordion" id="accordion">

                <!--inserire foreach-->                        
                    <div class="row card listDish mt-4 offset-1 col-10">
                        <div class="card-header " id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed btn-dish" type="button" data-toggle="collapse" data-target="#collapseOne"  aria-controls="collapseOne" aria-expanded="false">
                                    <span class="item">
                                        PIZZA MARGHERITA 
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </span>
                                    <span class="price">
                                        12,5€
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>                         
                                </button>
                            </h2>
                        </div>
                    
                        <div id="collapseOne" class="collapse col-12" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="desc">INGREDIENTI</div>
                            </div>
                        </div>
                    </div>

                    <div class="row card listDish mt-4 offset-1 col-10">
                        <div class="card-header " id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed btn-dish" type="button" data-toggle="collapse" data-target="#collapseTwo"  aria-controls="collapseTwo" aria-expanded="false">
                                    <span class="item">
                                        PIZZA MARGHERITA 
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </span>
                                    <span class="price">
                                        12,5€
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>                         
                                </button>
                            </h2>
                        </div>
                    
                        <div id="collapseTwo" class="collapse col-12" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="desc">INGREDIENTI</div>
                            </div>
                        </div>
                    </div>

                    <div class="row card listDish mt-4 offset-1 col-10">
                        <div class="card-header " id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed btn-dish" type="button" data-toggle="collapse" data-target="#collapseThree"  aria-controls="collapseThree" aria-expanded="false">
                                    <span class="item">
                                        PIZZA MARGHERITA 
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </span>
                                    <span class="price">
                                        12,5€
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>                         
                                </button>
                            </h2>
                        </div>
                    
                        <div id="collapseThree" class="collapse col-12" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="desc">INGREDIENTI</div>
                            </div>
                        </div>
                    </div>
    
                <!--fine foreach-->

            </div> <!--fine accordion-->

            <div class="col-12 order-1 col-lg-4 order-lg-2">
                <div class="row no-gutters sidebar sticky-top p-2">
                    
                    <div class="col-12 generalInfo p-4">
                        <div class="row detailsRest">
                            <div class="col-12 pt-4">
                                <span>OPENING HOURS:</span>
                                <span>ogni lunedi dalle 8 alle 19</span>
                            </div>
                            <div class="col-12 pt-4">
                                <span>ADDRESS:</span>
                                <span>Via San Giovanni Roma</span>
                            </div>
                            <div class="col-12 pt-4">
                                <span>TIPOLOGIA:</span>
                                <span>cinese, italiano, messicano</span>
                            </div>
                            <div class="col-12 pt-4">
                                <span>CONSEGNA</span>
                                <span>2,50€</span>
                            </div>              
                        </div>
                        <div class="col-12 text-center pt-4">
                            <h5>PAGAMENTO</h5>
                            <div class="row">
                                <div class="col-6">
                                    <i class="fas fa-money-bill-wave"></i>
                                    Cash
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                    Credit Card
                                </div>
                            </div>
           
                        </div>
                    </div> <!--fine generalInfo-->

                    <div class="col-12 cart p-4 ">
                        <div class="dishesSelected d-none d-lg-block">
                            <h4>YOUR ORDER</h4>
                            <ul>
                                <li>
                                    <span>pizza margherita</span>
                                    <span class="numbItem">5</span>
                                </li>
                                <li>
                                    <span>pizza ciao</span>
                                    <span class="numbItem">2</span>
                                </li>
                                <li>
                                    <span>carbonara</span>
                                    <span class="numbItem">4</span>
                                </li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-checkout btn-lg btn-block d-flex justify-content-around">
                            <i class="fa fa-chevron-up d-block d-lg-none" aria-hidden="true"></i>
                            <span>CHECKOUT</span>
                            <span>Total: 20,50€ </span>
                        </button>
                    </div>
                </div>    
            </div>
        </section>
        

    </div>


@endsection