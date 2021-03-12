<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My statistics</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200;1,300;1,400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Popper Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Load the required client component. -->
    <script src="https://js.braintreegateway.com/web/3.73.1/js/client.min.js"></script>

    <!-- Load Hosted Fields component. -->
    <script src="https://js.braintreegateway.com/web/3.73.1/js/hosted-fields.min.js"></script>
    <!-- Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    {{-- chart js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    
</head>
<body>
    @include('components.header')

    <main class="main-statistics">


        <div class="container-fluid p-0" id="cover-statistics">
            <div class="row no-gutters">
                <div class="cover col-12 d-flex flex-row align-items-center justify-content-center">
    
                    <div class="title text-uppercase">
                        <h1> My stats</h1>
                    </div>
                </div>
            </div>
        </div>
    
    
        <div class="container my-5 statisticsContainer">
    
            <div class="row chartRow">
    
                {{-- <div class="col-12 col-md-8 offset-md-2 py-3"> --}}

                    <div class="col-12 col-lg-8 offset-lg-2 pb-5">
                        <h3 class="title text-gold text-lighter py-3">By Year</h3>
                        <canvas id="userChartYear" class="rounded shadow"></canvas>
                    </div>

                    <div class="col-12 col-lg-8 offset-lg-2 pt-5">
                        <h3 class="title text-gold  text-lighter py-3">By Month </h3>
                        <canvas id="userChartMonth" class="rounded shadow"></canvas>
                    </div>               
                
                    
                {{-- </div> --}}
        
                
            </div>
            
    
            <script type="application/javascript">
            
                console.log('Hello Stats');
    
                var chartYear = {
                    type: 'line',
                    data: {
                        labels:  {!!json_encode($chart->labels)!!} ,
                        datasets: [
                            {
                                label: 'Annual Revenue',
                                backgroundColor: {!! json_encode($chart->colours)!!} ,
                                data:  {!! json_encode($chart->dataset)!!} ,
                                backgroundColor: 'rgba(192,192,192,0.1)',
                                borderColor:'rgba(200, 179, 111, 0.3)',
                                borderWidth:1,
                                pointBackgroundColor: 'rgba(218,165,32,0.4)',
                                pointBorderColor:'rgba(144,144,144,0.4)',
                                pointBorderWidth:1,                       
                                pointRadius: 2
                            },
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                }  
                //------------------------------------------
                var chartMonth = {
                    type: 'bar',
                    data: {
                        labels:  {!!json_encode($chartMonth->labels)!!} ,
        
                        datasets: [
                            {
                                label: 'Montly Revenue',
                                backgroundColor: {!! json_encode($chartMonth->colours)!!} ,
                                data:  {!! json_encode($chartMonth->dataset)!!} ,
                                borderColor: 'rgba(200, 179, 111, 0.6)',
                                backgroundColor:'rgba(192,192,192,0.1)',
                                borderWidth:1,
                            },
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true   
                                }
                            }]
                        }
                    }
                }
                //--------------------------
                var ctxYear = document.getElementById('userChartYear').getContext('2d');
                new Chart(ctxYear, chartYear);  
                //--------------------------
                var ctxMonth = document.getElementById('userChartMonth').getContext('2d');
                new Chart(ctxMonth, chartMonth);  
    
            </script>
    
        
        </div>
    
    
    

    </main>
    @include('components.footer')
    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>








